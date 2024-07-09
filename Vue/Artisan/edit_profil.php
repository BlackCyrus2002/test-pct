<?php
require_once('error_message.php');
require_once('../../App/Config/database.php');
require_once('../../App/Model/update_profil.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $users = $con->prepare("SELECT id_artisan, nom,phone_number,phone_wa, email,path_photo FROM artisans WHERE id_artisan = ?");
    $users->bind_param('i', $id);
    $users->execute();
    $result = $users->get_result();

    if ($result->num_rows > 0) {
        $only_user = $result->fetch_assoc();
    } else {
        echo "Utilisateur non trouvé.";
        exit();
    }
}
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
    exit();
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Editer le titre</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-xl-6"><br>
                    <h2 style="color: blue;">Modifier mon profil </h2>
                    <h5 style="color: green;">
                        <?php
                        echo $mess;
                        ?>
                    </h5>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom complet</label>
                            <input type="text" class="form-control" name="nom" id="nom" aria-describedby="helpId" placeholder="" value="<?php echo $only_user['nom'] ?>" />
                            <span style="color: red;font-size:18px">
                                <?php
                                echo $nom_error
                                ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Numéro de téléphone</label>
                            <input type="number" class="form-control" name="phone_number" id="phone_number" aria-describedby="helpId" placeholder="" value="<?php echo $only_user['phone_number'] ?>" />
                            <span style="color: red;font-size:18px">
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="phone_wa" class="form-label">Numéro WhattsApp</label>
                            <input type="number" class="form-control" name="phone_wa" id="phone_wa" aria-describedby="helpId" placeholder="" value="<?php echo $only_user['phone_wa'] ?>" />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="" value="<?php echo $only_user['email'] ?>" />
                            <span style="color: red;font-size:18px">
                                <?php
                                echo $email_error
                                ?>

                                <?php
                                echo $email_exist
                                ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="path_photo" class="form-label">Photo </label>
                            <input type="file" class="form-control" name="path_photo" id="path_photo" aria-describedby="helpId" onchange="previewImage(event)" />
                            <span style="color: red;font-size:18px">
                                <?php
                                echo $photo_user
                                ?>
                            </span>
                        </div>
                        <div>
                            <center>
                                <button type="submit" class="btn btn-primary" name="profil_update">Mettre à
                                    jour</button>
                            </center>
                        </div>
                        <span style="color: red; font-size: 18px;">
                            <?php echo isset($error_message) ? $error_message : ''; ?>
                        </span>
                        <span style="color: red; font-size: 18px;">
                            <?php echo isset($photo_error) ? $photo_error : ''; ?>
                        </span>
                    </form>
                    <center>
                        <br>
                        <div>
                            <img id="preview" src="" alt="" style="height: 200px;width:200px;border-radius:50%;box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.219)" />
                        </div>
                        <br>
                        <div style="margin: 0px 0px 10px 0px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chevron-double-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.646 6.646a.5.5 0 0 1 .708 0L8 12.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                                <path fill-rule="evenodd" d="M1.646 2.646a.5.5 0 0 1 .708 0L8 8.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                            </svg>
                        </div>
                        <div style="margin-bottom: 20px;">
                            <img src="<?php echo $only_user['path_photo'] ?>" alt="" style="height: 200px;width:200px;border-radius:50%;box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.219)">
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </header>
    <main></main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var preview = document.getElementById("preview");
                preview.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>
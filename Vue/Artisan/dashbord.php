<?php
session_start();
require_once('../../Vue/Artisan/error_message.php');
require_once('../../App/Config/database.php');
require_once('../../App/Model/add_product.php');
require_once('../../App/Model/see_product.php');
require_once('../../App/Model/search_product.php');

if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
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
?>
<!doctype html>
<html lang="en">

<head>
    <title>Dashbord</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header>
        <div class="container">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="navId" role="tablist">
                <li class="nav-item">
                    <a href="#tab1Id" class="nav-link active" data-bs-toggle="tab" aria-current="page">Profil</a>
                </li>
                <li class="nav-item">
                    <a href="#tab2Id" class="nav-link" data-bs-toggle="tab" aria-current="page">Produits</a>
                </li>
                <li class="nav-item">
                    <a href="#tab3Id" class="nav-link " data-bs-toggle="tab" aria-current="page">Mes produits</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="../../App/Model/logout.php" class="nav-link">
                        Se déconnecter
                    </a>
                </li>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab1Id" role="tabpanel">
                    <div class="container"><br>
                        <center>
                            <img src="<?php echo $only_user['path_photo']; ?>" alt=""
                                style="height: 200px;width:200px;border-radius:50%;box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.219)">

                            <h2 style="font-family: 'Times New Roman', Times, serif;font-weight:bold;margin-top:10px">

                                <?php echo $only_user['nom']; ?>
                                <?php echo $only_user['id_artisan']; ?>
                            </h2><br>
                            <div style="display: flex;justify-content:center">
                                <a href="https://Wa.me/+225<?php echo $only_user['phone_wa']; ?>"
                                    style="display:block;width:50px;height:50px;color:green" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                        class="bi bi-whatsapp" viewBox="0 0 16 16">
                                        <path
                                            d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                                    </svg>

                                </a>
                                <a href="tel:+225<?php echo $only_user['phone_number']; ?>"
                                    style="display:block;width:50px;height:50px;color:black" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                        class="bi bi-telephone" viewBox="0 0 16 16">
                                        <path
                                            d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                    </svg>

                                </a>
                            </div><br>
                            <a href="edit_profil.php?id=<?php echo $only_user['id_artisan']; ?>"
                                class="btn btn-primary">Modifier mes informations</a>
                        </center>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab2Id" role="tabpanel"><br>
                    <?php require_once('dashbord_prod.php'); ?>
                </div>
                <div class="tab-pane fade" id="tab3Id" role="tabpanel">
                    <br>
                    <?php require_once('dashbord_all_product.php'); ?>
                </div>
                <div class="tab-pane fade" id="tab4Id" role="tabpanel"></div>
            </div>

            <!-- (Optional) - Place this js code after initializing bootstrap.min.js or bootstrap.bundle.min.js -->
            <script>
            var triggerEl = document.querySelector("#navId a");
            bootstrap.Tab.getInstance(triggerEl).show(); // Select tab by name
            </script>

        </div>

    </header>
    <main></main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
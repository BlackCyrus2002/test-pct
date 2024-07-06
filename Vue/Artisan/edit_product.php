<?php
session_start();
require_once('../../Vue/Artisan/error_message.php');
require_once('../../App/Config/database.php');
require_once('../../App/Model/update_product.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = $con->prepare("SELECT id_produit,user_product,nom_produit,desc_produit,path_photo FROM produits WHERE id_produit=?");
    $product->bind_param('i', $id);
    $product->execute();
    $result = $product->get_result();

    if ($result->num_rows > 0) {
        $only_product = $result->fetch_assoc();
    } else {
        echo "Produit non trouvé.";
        exit();
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Modifier le produit</title>
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
            <br>

            <h2 style="color:blue;font-family:Georgia, 'Times New Roman', Times, serif">Editer le produit</h2><br>
            <div class="row">
                <div class="col-xl-6">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="user_product" id="user_product"
                                value="<?php echo $only_product['user_product'] ?>" hidden readonly />
                        </div>

                        <div class="mb-3">
                            <label for="nom_produit" class="form-label">Nom du produit: </label>
                            <input type="text" class="form-control" name="nom_produit" id="nom_produit"
                                aria-describedby="helpId" value="<?php echo $only_product['nom_produit'] ?>"
                                placeholder="" />
                            <span style="color: red; font-size: 18px;">
                                <?php echo isset($product_name_error) ? $product_name_error : ''; ?>
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="desc_produit" class="form-label">Description </label>
                            <textarea class="form-control" name="desc_produit" id="desc_produit" rows="3">
                            <?php echo $only_product['desc_produit'] ?>
                            </textarea>
                            <span style="color: red; font-size: 18px;">
                                <?php echo isset($product_desc_error) ? $product_desc_error : ''; ?>
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="path_photo" class="form-label">Photo</label>
                            <input type="file" class="form-control" name="path_photo" id="path_photo" />
                            <span style="color: red; font-size: 18px;">
                                <?php echo isset($product_img_error) ? $product_img_error : ''; ?>
                            </span>
                        </div>

                        <div>
                            <center><br>
                                <button type="submit" class="btn btn-primary" id="update_product" name="update_product">
                                    Mettre à jour
                                </button>
                            </center>
                        </div>

                        <span style="color: red; font-size: 18px;">
                            <?php echo isset($error_message) ? $error_message : ''; ?>
                        </span>
                        <span style="color: red; font-size: 18px;">
                            <?php echo isset($photo_error) ? $photo_error : ''; ?>
                        </span>
                        <span style="color: green; font-size: 18px;">
                            <?php echo isset($success_message) ? $success_message : ''; ?>
                        </span>
                    </form>
                </div>
            </div>
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
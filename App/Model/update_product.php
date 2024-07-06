<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['update_product'])) {

        if (!empty($_POST['nom_produit']) && !empty($_POST['desc_produit']) && !empty($_FILES['path_photo']['name'])) {
            $nom_produit = $_POST['nom_produit'];
            $desc_produit = $_POST['desc_produit'];
            $user_product = $_POST['user_product'];

            // Récupérer le chemin de l'image depuis la base de données
            $img = $con->prepare('SELECT path_photo FROM produits WHERE id_produit = ?');
            $img->bind_param('i', $id);
            $img->execute();
            $result = $img->get_result();
            $row = $result->fetch_assoc();
            if ($row) {
                $path_photo = $row['path_photo'];

                // Supprimer l'image du système de fichiers
                if (file_exists($path_photo)) {
                    unlink($path_photo);
                }

                //Définition du dossier et du chemin du fichier.
                $dossier = "../../Public/images/ImgProd/";
                $file = $dossier . basename($_FILES['path_photo']['name']);
                $uploadOk = 1;

                //Récupération de l'extension du fichier.(jpg,png,gif etc...)
                $img_name = strtolower(pathinfo($file, PATHINFO_EXTENSION));

                //Vérifie si le fichier est une image
                $check = getimagesize($_FILES["path_photo"]["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    $photo_error = "Le fichier n'est pas une image.";
                    $uploadOk = 0;
                }

                // Vérification de la taille du fichier
                if ($_FILES["path_photo"]["size"] > 500000) {
                    $photo_error = "Le fichier est trop volumineux.";
                    $uploadOk = 0;
                }

                // Vérification du format de l'image
                if ($img_name != "jpg" && $img_name != "png" && $img_name != "jpeg" && $img_name != "gif") {
                    $photo_error = "Seuls les formats JPG, JPEG, PNG & GIF sont autorisés.";
                    $uploadOk = 0;
                }

                //Si toutes les vérifications sont correctes, le fichier est déplacé vers le dossier ../../Public/images/ImgProd/
                if ($uploadOk == 0) {
                    $photo_error = "Désolé, votre photo n'a pas été enregistrée, réessayez svp!";
                } else {
                    if (move_uploaded_file($_FILES["path_photo"]["tmp_name"], $file)) {
                        $photo_path = $file;

                        // Insérer les données dans la base de données
                        $stmt = $con->prepare("UPDATE produits SET user_product=?, nom_produit=?, desc_produit=?, path_photo=? WHERE id_produit=?");
                        $stmt->bind_param("ssssi", $user_product, $nom_produit, $desc_produit, $photo_path, $id);
                        if ($stmt->execute()) {
                            $success_message = "Le produit a été bien modifier avec succès.";
                        } else {
                            $error_message = "Erreur lors de l'enregistrement, réessayez svp!";
                        }
                        $stmt->close();
                    } else {
                        $photo_error = "Désolé, une erreur s'est produite lors de l'upload de votre fichier.";
                    }
                }
            } else {
                echo "produit non trouvé.";
            }
            header('Location: ../../Vue/Artisan/dashbord.php');
            exit();
        } else {
            if (empty($_POST['nom_produit'])) {
                $product_name_error = "Le nom du produit est obligatoire.";
            }
            if (empty($_POST['desc_produit'])) {
                $product_desc_error = "La description du produit est obligatoire.";
            }
            if (empty($_FILES['path_photo']['name'])) {
                $product_img_error = "La photo du produit est obligatoire.";
            }
        }
    }
}
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['profil_update'])) {

        if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_FILES['path_photo']['name'])) {
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $phone_number = $_POST['phone_number'];
            $phone_wa = $_POST['phone_wa'];

            // Récupérer le chemin de l'image depuis la base de données
            $img = $con->prepare('SELECT path_photo FROM artisans WHERE id_artisan = ?');
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
                $dossier = "../../Public/images/ImgArt/";
                $file = $dossier . time() . '-' . basename($_FILES['path_photo']['name']);
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

                // Vérification de la taille du fichier en Ko (20000000 o=20mo)
                if ($_FILES["path_photo"]["size"] > 20000000) {
                    $photo_error = "La photo est trop volumineuse.";
                    $uploadOk = 0;
                }

                // Vérification du format de l'image
                if ($img_name != "jpg" && $img_name != "png" && $img_name != "jpeg" && $img_name != "gif") {
                    $photo_error = "Seuls les formats JPG, JPEG, PNG & GIF sont autorisés.";
                    $uploadOk = 0;
                }

                //Si toutes les vérifications sont correctes, le fichier est déplacé vers le dossier ../../Public/images/ImgProd/
                if ($uploadOk == 0) {
                    $photo_error = "Désolé, votre photo n'a pas été enregistrée. Photo trop volumineuse, réessayez svp!";
                } else {
                    if (move_uploaded_file($_FILES["path_photo"]["tmp_name"], $file)) {
                        $photo_path = $file;

                        // Insérer les données dans la base de données
                        $stmt = $con->prepare("UPDATE artisans SET nom=?, email=?, phone_number=?,phone_wa=?, path_photo=? WHERE id_artisan=?");
                        $stmt->bind_param("sssssi", $nom, $email, $phone_number, $phone_wa, $photo_path, $id);
                        if ($stmt->execute()) {
                            $success_message = "La photo a été bien modifier avec succès.";
                        } else {
                            $error_message = "Erreur lors de l'enregistrement, réessayez svp!";
                        }
                        $stmt->close();
                        header('Location: ../../Vue/Artisan/dashbord.php');
                        exit();
                    } else {
                        $photo_error = "Désolé, une erreur s'est produite lors de l'upload de votre fichier.";
                    }
                }
            } else {
                echo "produit non trouvé.";
            }
        } else {
            if (empty($_POST['nom'])) {
                $nom_error = "Le champ nom est obligatoire";
            }
            if (empty($_POST['email'])) {
                $email_error = "L'email est obligatoire";
            }
            if (empty($_POST['password'])) {
                $password_error = "Le mot de passe est obligatoire";
            }
            if (empty($_FILES['path_photo']['name'])) {
                $photo_user = "Votre photo est obligatoire";
            }
        }
    }
}
<?php
require_once('App/Config/database.php');
if (isset($_POST['send'])) {

    if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_FILES['path_photo']['name'])) {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $phone_wa = $_POST['phone_wa'];
        $password_user = password_hash($_POST['password'], PASSWORD_DEFAULT);

        //Définition du dossier et du chemin du fichier.
        $dossier = "Public/images/ImgArt/";
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
            $photo_error = "Désolé, votre photo n'a pas été enregistrée, réessayez svp!";
        } else {
            if (move_uploaded_file($_FILES["path_photo"]["tmp_name"], $file)) {
                $photo_path = $file;

                require('App/Model/email_existe.php');
            } else {
                $photo_error = "Désolé, une erreur s'est produite lors de l'upload de votre fichier.";
            }
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
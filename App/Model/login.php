<?php
session_start();
require_once('App/Config/database.php');
if (isset($_POST['login'])) {
    if (!empty($_POST['email_connect']) && !empty($_POST['password_connect'])) {
        $email = $_POST['email_connect'];
        $password_user = $_POST['password_connect'];

        $req = $con->prepare("SELECT id_artisan,nom,password,phone_number,phone_wa,path_photo FROM artisans WHERE email = ?");
        $req->bind_param("s", $email);
        $req->execute();
        $req->store_result();
        if ($req->num_rows > 0) {
            // L'utilisateur existe, vérifions le mot de passe
            $req->bind_result($id, $nom, $hashed_password, $phone_number, $phone_wa, $path_photo);
            $req->fetch();

            if (password_verify($password_user, $hashed_password)) {
                // Mot de passe correct, démarrage de la session
                $_SESSION['user_id'] = $id;

                // Définir des cookies pour se souvenir de l'utilisateur
                setcookie("user_id", $id, time() + (3600), "/"); // 3600 = 1 heure

                // Rediriger l'utilisateur vers la page d'accueil ou tableau de bord
                header("Location: Vue\Artisan\dashbord.php");
                exit();
            } else {
                $error_message = "Email ou mot de passe incorrect.";
            }
        } else {
            $error_message = "Email ou mot de passe incorrect.";
        }

        $req->close();
    } else {
        if (empty($_POST['email'])) {
            $email_error_connect = "L'email est obligatoire";
        }
        if (empty($_POST['password'])) {
            $password_error_connect = "Le mot de passe est obligatoire";
        }
    }
}
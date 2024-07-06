<?php

$req = $con->prepare("SELECT email FROM artisans WHERE email = ?");
$req->bind_param("s", $email);
$req->execute();
$req->store_result();

if ($req->num_rows > 0) {
    $email_exist = "Cet email est déjà utilisé. Veuillez en choisir un autre.";
} else {
    // Si l'email n'existe pas, insérez le nouvel utilisateur
    $req->close();
    $req = $con->prepare("INSERT INTO artisans (nom, email, password,phone_number,phone_wa,path_photo) VALUES (?, ?, ?, ?, ?, ?)");
    $req->bind_param("ssssss", $nom, $email, $password_user, $phone_number, $phone_wa, $photo_path);

    if ($req->execute()) {
        $mess = "Vous avez été bien ajouté";
    } else {
        $error_message = "Erreur lors de l'enregistrement, réessayez svp!";
    }
    header('Location: index.php');
    exit();
}
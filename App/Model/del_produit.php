<?php
require_once '../../App/Config/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

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
        $produits = $con->prepare('DELETE FROM produits WHERE id_produit = ?');
        unlink($id);
        $produits->bind_param('i', $id);
        $produits->execute();
        $result = $produits->get_result();
        echo 'Produit supprimé.';
    } else {
        echo "produit non trouvé.";
    }
    header('Location: ../../Vue/Artisan/dashbord.php');
    exit();
}
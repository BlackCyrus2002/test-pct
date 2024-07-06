<?php
require_once '../../App/Config/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $users = $con->prepare('DELETE FROM artisans WHERE id_artisan = ?');
    $users->bind_param('i', $id);
    $users->execute();
    $result = $users->get_result();
    echo 'Utilisateur supprimé.';
    header('Location: ../../index.php');
}
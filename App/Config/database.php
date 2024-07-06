<?php
$database = "test_pct";
$username = "root";
$password = "";
$servername = "localhost";
$con = new mysqli($servername, $username, $password, $database);

if ($con) {
    $message = "Server bien configuré";
} else {
    $message = "Echec de la connexion";
}
<?php
if (isset($_GET['search_product'])) {
    $search = $_GET['search'];
    $products = "SELECT id_produit,user_product,nom_produit,desc_produit,path_photo FROM produits WHERE nom_produit LIKE '%$search%' OR desc_produit LIKE '%$search%' ORDER BY path_photo desc ";
    $product = mysqli_query($con, $products);
}
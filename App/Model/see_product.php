<?php
$products = "SELECT id_produit,user_product,nom_produit,desc_produit,path_photo FROM produits ORDER BY path_photo desc";
$product = mysqli_query($con, $products);
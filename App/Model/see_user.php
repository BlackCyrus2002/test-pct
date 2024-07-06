<?php
$users = "SELECT id_artisan,nom,email FROM artisans";
$user = mysqli_query($con, $users);
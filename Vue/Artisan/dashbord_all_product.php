<h2 style="color: blue;">Mes produits</h2><br>
<div class="row">
    <div class="col-xl-6">
        <form action="" method="get">
            <div class="input-group">
                <input class="form-control border-end-0 border rounded-pill" type="search" placeholder="search"
                    id="search" name="search" required>
                <span class="input-group-append">
                    <button class="form-control border-bottom-0 border rounded-pill ms-n5" type="submit"
                        name="search_product" id="search_product">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                    </button>
                </span>
            </div>
        </form>
        <br>
    </div>
</div>
<div class="row">
    <?php while ($fil = mysqli_fetch_array($product)) { ?>
    <?php if ($fil['user_product'] == $_SESSION['user_id']) { ?>
    <div class="col-md-3" style="margin-bottom:20px">
        <div class="card text-white" style="height: 100%;">
            <img class="card-img-top" src="<?php echo $fil['path_photo']; ?>" alt="Title" style="height: 200px;" />
            <div class="card-body">
                <h4 class="card-title" style="color:black">
                    <?php echo $fil['nom_produit']; ?>
                </h4>
                <p class="card-text" style="color:black">
                    <?php echo $fil['desc_produit']; ?>
                </p>
            </div>
            <div class="card-footer">
                <center>
                    <a href="edit_product.php?id=<?php echo $fil['id_produit']; ?>" class="btn btn-primary">Modifier</a>
                    <a href="../../App/Model/del_produit.php?id=
                    <?php echo
                    $fil['id_produit'];
                    ?>" class="btn btn-danger">Supprimer</a>
                </center>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php } ?>
</div>
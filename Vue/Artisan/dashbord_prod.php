<h2 style="color: blue;">Ajouter un produit</h2><br>
<div class="row">
    <div class="col-xl-6">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="text" class="form-control" name="user_product" id="user_product"
                    value="<?php echo $_SESSION['user_id']; ?>" hidden readonly />
            </div>

            <div class="mb-3">
                <label for="nom_produit" class="form-label">Nom du produit: </label>
                <input type="text" class="form-control" name="nom_produit" id="nom_produit" aria-describedby="helpId"
                    placeholder="" required />
                <span style="color: red; font-size: 18px;">
                    <?php echo isset($product_name_error) ? $product_name_error : ''; ?>
                </span>
            </div>

            <div class="mb-3">
                <label for="desc_produit" class="form-label">Description </label>
                <textarea class="form-control" name="desc_produit" id="desc_produit" rows="3" required></textarea>
                <span style="color: red; font-size: 18px;">
                    <?php echo isset($product_desc_error) ? $product_desc_error : ''; ?>
                </span>
            </div>

            <div class="mb-3">
                <label for="path_photo" class="form-label">Photo</label>
                <input type="file" class="form-control" name="path_photo" accept="image/*" id="path_photo"
                    onchange="previewImage(event)" />
                <span style="color: red; font-size: 18px;">
                    <?php echo isset($product_img_error) ? $product_img_error : ''; ?>
                </span>
            </div>
            <div class="col-xl-12">
                <img id="preview" src="" alt="" style="height:200px" />
            </div>

            <div>
                <center><br>
                    <button type="submit" class="btn btn-primary" id="put_online" name="put_online">Mettre en
                        ligne</button>
                </center>
            </div>

            <span style="color: red; font-size: 18px;">
                <?php echo isset($error_message) ? $error_message : ''; ?>
            </span>
            <span style="color: red; font-size: 18px;">
                <?php echo isset($photo_error) ? $photo_error : ''; ?>
            </span>
            <span style="color: green; font-size: 18px;">
                <?php echo isset($success_message) ? $success_message : ''; ?>
            </span>
        </form>
    </div>
</div>
<script>
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var preview = document.getElementById("preview");
        preview.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>
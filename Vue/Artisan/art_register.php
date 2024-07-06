<div class="row">
    <div class="col-xl-6"><br>
        <h2 style="color: blue;">S'enregistrer</h2>
        <h5 style="color: green;">
            <?php
            echo $mess;
            ?>
        </h5>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom complet</label>
                <input type="text" class="form-control" name="nom" id="nom" aria-describedby="helpId" placeholder=""
                    value="" />
                <span style="color: red;font-size:18px">
                    <?php
                    echo $nom_error
                    ?>
                </span>
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Numéro de téléphone</label>
                <input type="number" class="form-control" name="phone_number" id="phone_number"
                    aria-describedby="helpId" placeholder="" value="" />
                <span style="color: red;font-size:18px">
                </span>
            </div>
            <div class="mb-3">
                <label for="phone_wa" class="form-label">Numéro WhattsApp</label>
                <input type="number" class="form-control" name="phone_wa" id="phone_wa" aria-describedby="helpId"
                    placeholder="" value="" />
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder=""
                    value="" />
                <span style="color: red;font-size:18px">
                    <?php
                    echo $email_error
                    ?>

                    <?php
                    echo $email_exist
                    ?>
                </span>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe :</label>
                <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId"
                    placeholder="*********" />
                <span style="color: red;font-size:18px">
                    <?php
                    echo $password_error
                    ?>
                </span>
            </div>
            <div class="mb-3">
                <label for="path_photo" class="form-label">Photo </label>
                <input type="file" class="form-control" name="path_photo" id="path_photo" aria-describedby="helpId" />
                <span style="color: red;font-size:18px">
                    <?php
                    echo $photo_user
                    ?>
                </span>
            </div>
            <div>
                <center>
                    <button type="submit" class="btn btn-primary" name="send">S'enregistrer</button>
                </center>
            </div>
            <span style="color: red; font-size: 18px;">
                <?php echo isset($error_message) ? $error_message : ''; ?>
            </span>
            <span style="color: red; font-size: 18px;">
                <?php echo isset($photo_error) ? $photo_error : ''; ?>
            </span>
        </form>
    </div>
</div>
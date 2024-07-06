<div class="row">
    <div class="col-xl-6"><br>
        <h2 style="color: blue;">Se connecter</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email_connect" id="email_connect"
                    aria-describedby="helpId" placeholder="" value="" />
                <span style="color: red;font-size:18px">
                    <?php
                    echo $email_error_connect
                    ?>

                    <?php
                    echo $error_message
                    ?>
                </span>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe :</label>
                <input type="password" class="form-control" name="password_connect" id="password_connect"
                    aria-describedby="helpId" placeholder="*********" />
                <span style="color: red;font-size:18px">
                    <?php
                    echo $password_error_connect
                    ?>
                </span>
            </div>
            <div>
                <center>
                    <button type="submit" class="btn btn-primary" name="login">Se connecter</button>
                </center>
            </div>
        </form>
    </div>
</div>
<br>
<h2 style="color: blue;font-family: 'Times New Roman', Times, serif;">Artisan</h2>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($fil = mysqli_fetch_array($user)) { ?>
                <tr class="">
                    <td scope="row">
                        <?php
                        echo $fil['id_artisan'];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $fil['nom'];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $fil['email'];
                        ?>
                    </td>
                    <td>
                        <a href="Vue/Artisan/see_artisan.php?id=<?php echo $fil['id_artisan']; ?>" class="btn btn-primary">
                            Voir
                        </a>
                        <a href="App/Model/del_artisan.php?id=
                    <?php echo
                    $fil['id_artisan'];
                    ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
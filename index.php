<?php
require_once('Vue/Artisan/error_message.php');
require_once('App/Config/database.php');
require_once('App/Model/register.php');
require_once('App/Model/login.php');
require_once('App/Model/see_user.php');
?>

<!doctype html>
<html lang="en">

<head>
    <title>Test PCT</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

</head>

<body>
    <header>
        <div class="container"><br>
            <h1>Test PCT</h1>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="navId" role="tablist">
                <li class="nav-item">
                    <a href="#tab1Id" class="nav-link active" data-bs-toggle="tab">Inscription</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="#tab2Id" class="nav-link" data-bs-toggle="tab">Connexion</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="#tab3Id" class="nav-link" data-bs-toggle="tab">Artisans</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab1Id" role="tabpanel">
                    <?php
                    require_once('Vue/Artisan/art_register.php');
                    ?>
                </div>
                <div class="tab-pane fade" id="tab2Id" role="tabpanel">
                    <?php
                    require_once('Vue/Artisan/art_connect.php');
                    ?>
                </div>
                <div class="tab-pane fade " id="tab3Id" role="tabpanel">
                    <?php
                    require_once('Vue/Artisan/artisan.php');
                    ?>
                </div>
            </div>

            <!-- (Optional) - Place this js code after initializing bootstrap.min.js or bootstrap.bundle.min.js -->
            <script>
            var triggerEl = document.querySelector("#navId a");
            bootstrap.Tab.getInstance(triggerEl).show(); // Select tab by name
            </script>


        </div>
    </header>
    <main>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
<?php
session_start();
global $dsn;
$user = new Users($dsn);


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/styles/index.css">
    <link rel="stylesheet" href="/src/styles/partials_styles/demo-navbar.css">
    <title>Démos</title>
</head>

<body>
    <?php
    partial("navbar");
    ?>

    <header class="demos-container">


        <?php

        include 'partials/demo-navbar.php';

        ?>



    </header>
    <main class="demos-content">
        <h2>Bienvenue sur la page démo</h2>

    </main>

    <script src="./src/js/user-form.js"></script>
    <script src="./src/js/hamburger.js"></script>
</body>

</html>
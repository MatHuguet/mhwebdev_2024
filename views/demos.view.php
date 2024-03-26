<?php
global $dsn;
$user = new Users($dsn);

$datas = $user->getUser('hello@mail.fr');
ddump($datas);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/styles/index.css">
    <title>Démos</title>
</head>

<body>
    <?php
    partial("navbar");
    ?>

    <div class="demos-menu-container">
        <ul class="demos-navlist">
            <li class="demos-nav-item">Démo</li>
            <li class="demos-nav-item">Design</li>
            <li class="demos-nav-item">Code</li>
        </ul>
    </div>
    <!-- DEMOS 

Ajouter des projets
- Maquettage et prototypage :
ECF
Sterne et Mousse :
lien prototype : https://www.figma.com/proto/Osct6kXpSNmfd6eooSGK7e/Sterne%26Mousse---refonte?page-id=98%3A7193&type=design&node-id=98-7194&viewport=213%2C380%2C0.26&t=T9qjF4owdSYQHT9o-1&scaling=min-zoom&starting-point-node-id=98%3A7194&mode=design

Morceaux de code

Projet responsive

Demo interactive avec connexion et sorte de livre d'or

-->



    <!--
    <header class="user-nav">
        <ul>
            <li>
                <a href="#">se connecter</a>
                <a href="#">créer un compte</a>
            </li>
        </ul>
    </header>
    <main>
        <section class="user-connect">
            <form class="connect-form" action="demos.view.php" method="post">

            </form>
        </section>
    </main>
-->

    <div class="user-connect-container">

        <li><a href="/login">Se Connecter</a></li>
        <li><a href="/signin">S'inscrire</a></li>
        <!-- if connected
        <li><a href="dashboard.php" class="btn">Dashboard</a></li>
-->
    </div>


    <div class="test">
        <a href="https://www.figma.com/proto/Osct6kXpSNmfd6eooSGK7e/Sterne%26Mousse---refonte?page-id=98%3A7193&type=design&node-id=98-7194&viewport=213%2C380%2C0.26&t=T9qjF4owdSYQHT9o-1&scaling=min-zoom&starting-point-node-id=98%3A7194&mode=design" target="_blank">Voir
            le prototype</a>

    </div>


    <script src="./src/js/user-form.js"></script>
    <script src="./src/js/hamburger.js"></script>
</body>

</html>
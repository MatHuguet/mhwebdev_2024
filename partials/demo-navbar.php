<?php

$isConnected = false;
if (isset($_SESSION['user_id']) && isset($_SESSION['user'])) {
    $isConnected = true;
}


?>



<div class="user-connect-container">
    <ul class="demos-navlist">
        <?php
        if ($_SERVER['REQUEST_URI'] === "/demos/login" || $_SERVER['REQUEST_URI'] === "/demos/signin") {
        ?>
            <li class="demos-nav-item"><a href="/">Retour à l'accueil</a></li>
        <?php
        } elseif ($_SERVER['REQUEST_URI'] === "/demos/compte" || $_SERVER['REQUEST_URI'] === "/demos/compte/parametres") {
        ?>
            <li class="demos-nav-item"><a href="/demos">Retour à la page démo</a></li>
        <?php
        } else {
        ?>
            <li class="demos-nav-item"><a href="/demos">Démo</a></li>
            <li class="demos-nav-item"><a href="#">Design</a></li>
            <li class="demos-nav-item"><a href="#">Code</a></li>
        <?php
        }
        ?>
    </ul>
    <ul class="demos-connect">
        <?php
        if ($isConnected) {
            if ($_SERVER['REQUEST_URI'] === "/demos/compte") {
        ?>

            <li class="user-nav-item"><a href="/demos/logout">Se Déconnecter</a></li>
            <li class="user-nav-item"><a href="/demos/compte/parametres">Paramètres de compte</a></li>
<?php
            } elseif ($_SERVER['REQUEST_URI'] === "/demos/compte/parametres") {
?>
            <li class="user-nav-item"><a href="/demos/compte">Mon Compte</a></li>
            <li class="user-nav-item"><a href="/demos/logout">Se Déconnecter</a></li>

<?php
            } else {
    ?>

            <li class="user-nav-item"><a href="/demos/compte">Mon Compte</a></li>
            <li class="user-nav-item"><a href="/demos/logout">Se Déconnecter</a></li>
            <li class="user-nav-item"><a href="/demos/compte/parametres">Paramètres de compte</a></li>

<?php
}

        ?>


        <?php
        } else {

        ?>
            <li class="user-nav-item"><a href="/demos/login">Se Connecter</a></li>
            <li class="user-nav-item"><a href="/demos/signin">S'inscrire</a></li>
        <?php
        }

        ?>
    </ul>

    <!-- if connected
<li><a href="dashboard.php" class="btn">Dashboard</a></li>
-->
</div>
<?php
session_start();
global $dsn;

$user = new Users($dsn);
$userid = '';
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id']) && !isset($_SESSION['user'])) {
    header('Location: /demos/login');
    exit;
} else {
    $userid = $_SESSION['user_id'];
    $userDatas = $user->getUser($userid);
}

// get restaurant id after user choice
$id = filter_input(INPUT_GET, "style", FILTER_VALIDATE_INT);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/styles/index.css">
    <link rel="stylesheet" href="/src/styles/pages_styles/user-pages.css">
    <link rel="stylesheet" href="/src/styles/partials_styles/demo-navbar.css">
    <link rel="stylesheet" href="/src/styles/pages_styles/restaurant.css">
    <title>Créez votre restaurant - Mathieu Huguet - Développeur Web</title>
</head>

<body>

    <?php
    include 'partials/demo-navbar.php';
    ?>


    <!-- CHOOSE RESTAURANT STYLE -->

    <div class="restaurant-container">
        <h3>Sélectionnez le style de votre restaurant :</h3>
        <div class="restaurant-sketch">
            <form action="" method="get">

                <button type="submit" id="restaurant-select" name="style" value="1">
                    <img src="/public/images/restaurant/rest_0.png" alt="" class="restaurant-style-img <?php if ($id === 1) {
                                                                                                            echo 'activ';
                                                                                                        } ?>">
                </button>
                <button type="submit" id="restaurant-select" name="style" value="2">
                    <img src="/public/images/restaurant/rest_1.png" alt="" class="restaurant-style-img <?php if ($id === 2) {
                                                                                                            echo 'activ';
                                                                                                        } ?>">
                </button>
                <button type="submit" id="restaurant-select" name="style" value="3">
                    <img src="/public/images/restaurant/rest_2.png" alt="" class="restaurant-style-img <?php if ($id === 3) {
                                                                                                            echo 'activ';
                                                                                                        } ?>">
                </button>
                <button type="submit" id="restaurant-select" name="style" value="4">
                    <img src="/public/images/restaurant/rest_3.png" alt="" class="restaurant-style-img <?php if ($id === 4) {
                                                                                                            echo 'activ';
                                                                                                        } ?>">
                </button>
            </form>
        </div>

    </div>
    <div class="restaurant-colorise">
        <?php

        switch ($id) {
            case 1:
                include 'partials/restaurants/restaurant_1.php';
                break;
            case 2:
                include 'partials/restaurants/restaurant_2.php';
                break;
            case 3:
                include 'partials/restaurants/restaurant_3.php';
                break;
            case 4:
                include 'partials/restaurants/restaurant_4.php';
                break;
            default:
                echo '';
        }
        if ($id) {
            require 'partials/restaurants/colors-form.php';
        }

        ?>


    </div>

    <script src="/src/js/restaurant-manager.js"></script>
</body>

</html>
<?php
session_start();
global $dsn;

$user = new Users($dsn);
$userid = '';
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id']) && !isset($_SESSION['user'])) {
    header('Location: /demos/login');
    exit;
}
$userid = $_SESSION['user_id'];
$userDatas = $user->getUser($userid);


$userRestaurant  = new Restaurant($dsn);
$restaurantDatas = $userRestaurant->getRestaurant($userid);

$userMenu = new Menus($dsn);
//ddump($restaurantDatas);
if ($_SESSION['user_id'] === $restaurantDatas[0]['created_by']) {

    $restaurant_id = $restaurantDatas[0]['restaurant_id'];
    $restaurant_type = $restaurantDatas[0]['restaurant_type'];
    $var = filter_input(INPUT_GET, 'edit', FILTER_VALIDATE_INT);
}


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
    <title>Inscription - Mathieu Huguet - Développeur Web</title>
</head>

<body>

    <?php
    include 'partials/demo-navbar.php';



    switch ($var) {
        case 0:
            require 'partials/colors-edit.php';
            break;
        case 1:
            require 'partials/menu-edit.php';
            break;
        case 2:
            require 'partials/restaurant-delete.php';
            break;
    }

    ?>

    <script src="/src/js/restaurant-manager-edit.js"></script>
</body>

</html>
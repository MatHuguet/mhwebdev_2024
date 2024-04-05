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
$id = filter_input(INPUT_POST, "style", FILTER_VALIDATE_INT);
$restaurantType;

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



    <h2>Choisissez un nom pour votre restaurant et créez votre propre menu!</h2>

    <?php

    // EXPORT COLORS TO database tabel 'restaurants_colors'
    if (isset($_POST['color-submit']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        // value list :
        $restaurant_properties = [];
        $restaurantDatas = [];
        $restaurantDatas['id']                          = $_POST['restaurant_id'];
        $restaurantDatas['type']                        = $_POST['restaurant_type'];
        $restaurantDatas['userid']                      = $_SESSION['user_id'];

        $user_restaurant = new Restaurant($dsn);
        $user_restaurant->setRestaurant($restaurantDatas);
        $restaurant = $user_restaurant->getRestaurantObject();



        $restaurant_properties['restaurant_id']         = $_POST['restaurant_id'];
        $restaurant_properties['mainColor']             = $_POST['main-color'];
        $restaurant_properties['secondColor']           = $_POST['second-color'];
        $restaurant_properties['brandColor']            = $_POST['brand-color'];
        $restaurant_properties['doorColor']             = $_POST['door-color'];
        $restaurant_properties['secondDoorColor']       = $_POST['second-door-color'];
        $restaurant_properties['mouluresColor']         = $_POST['moulures-color'];
        $restaurant_properties['bordersMouluresColor']  = $_POST['borders-moulures-colors'];
        $restaurant_properties['poigneeColor']          = $_POST['poignee-color'];


        $restaurantColors = new Colors($dsn);
        $restaurantColors->setColors($restaurant_properties);
        $colors = $restaurantColors->getColorsInputs();

        $getRestaurant = $user_restaurant->getRestaurant($userid);

        if (empty($getRestaurant)) {
            $user_restaurant->createRestaurant($restaurant);
            $restaurantColors->registerColors($colors);
        }
    ?>



        <div class="restaurant-texts">

            <div class="display-colored-rest">
                <?php
                include "partials/restaurants/restaurant_" . $restaurantDatas['type'] . ".php";
                ?>
            </div>

            <form method="post" action="" class="form-colors">
                <fieldset>
                    <input type="text" value="<?= $restaurant_properties['restaurant_id'] ?>" name="restaurant_id" hidden />
                    <label for="restaurant-name">Le nom du restaurant (20 caractères maximum) : </label>
                    <input type="text" id="restaurant-name" name="restaurant-name" value="" maxlength="20" />
                    <label for="restaurant-name-font">Choisissez une police d'écriture :</label>
                    <select name="font" id="font-select-input">
                        <option value="">Sélectionnez dans la liste</option>
                        <option value="kapakana">Kapakana</option>
                        <option value="arial">Arial</option>
                    </select>
                    <label for="restaurant-name-color">La couleur du nom : </label>
                    <input type="color" id="restaurant-name-color" name="restaurant-name-color" value="#000000" />
                    <label for="welcome"> Texte de bienvenue :</label>
                    <textarea id="welcome" name="welcome" value="" maxlength="150"></textarea>


                    <input class="btn submit-btn" type="submit" name="brand-submit" value="Valider le nom" />
                </fieldset>
            </form>
        <?php
    }



    if (isset($_POST['brand-submit'])) {


        $restaurantBrand['restaurant_id']   = $_POST['restaurant_id'];
        $restaurantBrand['name']            = $_POST['restaurant-name'];
        $restaurantBrand['welcome']         = $_POST['welcome'];
        $restaurantBrand['brand_font']      = $_POST['font'];
        $restaurantBrand['brand_color']     = $_POST['restaurant-name-color'];

        $menu = new Menus($dsn);
        $menu->setMenu($restaurantBrand);
        $menuDatas = $menu->getMenuInputs();
        $menu->registerMenu($menuDatas);



        ?>
            <form method="post" action="" class="form-colors" id="form2">
                <fieldset>
                    <!-- HIDDEN INFOS -->

                    <input type="text" value="<?= $restaurantBrand['restaurant_id'] ?>" name="restaurant_id" hidden />


                    <!-- ------------ -->
                    <fieldset class="menu-fields">
                        <legend>Définir une ou plusieurs entrées</legend>
                        <!-- ENTREE 1 -->
                        <label for="entree1"> Entrée 1 :</label>
                        <input onkeyup="checkEntreeFields()" type="text" id="entree1" name="entree1" value="" maxlength="50" required />
                        <label for="entree1-desc"> Description :</label>
                        <textarea onkeyup="checkEntreeFields()" id="entree1-desc" name="entree1-desc" value="" maxlength="150" required></textarea>

                        <!-- ENTREE 2 -->
                        <label for="entree2"> Entrée 2 :</label>
                        <input onkeyup="checkEntreeFields()" type="text" id="entree2" name="entree2" value="" maxlength="50" disabled />
                        <label for="entree2-desc"> Description :</label>
                        <textarea onkeyup="checkEntreeFields()" id="entree2-desc" name="entree2-desc" value="" maxlength="150"></textarea>

                        <!-- ENTREE 3 -->
                        <label for="restaurant-name"> Entrée 3 :</label>
                        <input type="text" id="entree3" name="entree3" value="" maxlength="50" />
                        <label for="entree3-desc"> Description :</label>
                        <textarea id="entree3-desc" name="entree3-desc" value="" maxlength="150"></textarea>

                    </fieldset>
                    <fieldset class="menu-fields">
                        <legend>Définir un ou plusieurs plats</legend>
                        <!-- PLAT 1 -->
                        <label for="plat1"> Plat 1 :</label>
                        <input onkeyup="checkPlatFields()" type="text" id="plat1" name="plat1" value="" maxlength="50" required />
                        <label for="plat1-desc"> Description :</label>
                        <textarea onkeyup="checkPlatFields()" id="plat1-desc" name="plat1-desc" value="" maxlength="150" required></textarea>

                        <!-- PLAT 2 -->
                        <label for="plat2"> Plat 2 :</label>
                        <input onkeyup="checkPlatFields()" type="text" id="plat2" name="plat2" value="" maxlength="50" />
                        <label for="plat2-desc"> Description :</label>
                        <textarea onkeyup="checkPlatFields()" id="plat2-desc" name="plat2-desc" value="" maxlength="150"></textarea>

                        <!-- PLAT 3 -->
                        <label for="plat3"> Plat 3 :</label>
                        <input type="text" id="plat3" name="plat3" value="" maxlength="50" />
                        <label for="plat3-desc"> Description :</label>
                        <textarea id="plat3-desc" name="plat3-desc" value="" maxlength="150"></textarea>


                    </fieldset>
                    <fieldset class="menu-fields">
                        <legend>Définir un ou plusieurs desserts :</legend>
                        <!-- PLAT 1 -->
                        <label for="dessert1"> Dessert 1 :</label>
                        <input onkeyup="checkDessertFields()" type="text" id="dessert1" name="dessert1" value="" maxlength="50" required />
                        <label for="dessert1-desc"> Description :</label>
                        <textarea onkeyup="checkDessertFields()" id="dessert1-desc" name="dessert1-desc" value="" maxlength="150" required></textarea>

                        <!-- PLAT 2 -->
                        <label for="dessert2"> Dessert 2 :</label>
                        <input onkeyup="checkDessertFields()" type="text" id="dessert2" name="dessert2" value="" maxlength="50" />
                        <label for="dessert2-desc"> Description :</label>
                        <textarea onkeyup="checkDessertFields()" id="dessert2-desc" name="dessert2-desc" value="" maxlength="150"></textarea>

                        <!-- PLAT 3 -->
                        <label for="dessert3"> Dessert 3 :</label>
                        <input type="text" id="dessert3" name="dessert3" value="" maxlength="50" />
                        <label for="dessert3-desc"> Description :</label>
                        <textarea id="dessert3-desc" name="dessert3-desc" value="" maxlength="150"></textarea>

                    </fieldset>

                </fieldset>

                <input class="btn submit-btn" type="submit" name="restaurant-submit" value="Valider mon restaurant" />

            </form>
        <?php

    }

    if (isset($_POST['restaurant-submit']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $getMenu = new Menus($dsn);
        $usermenu = $getMenu->getMenu($_POST['restaurant_id']);

        if ($usermenu[0]['restaurant_id'] == $_POST['restaurant_id']) {
            $menuid = $usermenu[0]['menu_id'];
        }

        try {

            $pdo = $dsn->getPdo();
            $pdo->beginTransaction();

            // ENTREES -> to database
            for ($i = 1; $i <= 3; $i++) {
                if (isset($_POST['entree' . strval($i)]) && !empty($_POST['entree' . strval($i)]) && isset($_POST['entree' . strval($i) . '-desc']) && !empty($_POST['entree' . strval($i) . '-desc'])) {

                    $entrees = new Entree($dsn);
                    $entrees->setEntree($_POST['entree' . strval($i)], $_POST['entree' . strval($i) . '-desc'], strval('entree' . $i));
                    $entreesDatas = $entrees->getEntreeInputs();
                    $stmt = $entrees->registerEntree($menuid, $entreesDatas);
                }
            }
            // PLATS -> to database
            for ($j = 1; $j <= 3; $j++) {
                if (isset($_POST['plat' . strval($j)]) && !empty($_POST['plat' . strval($j)]) && isset($_POST['plat' . strval($j) . '-desc']) && !empty($_POST['plat' . strval($j) . '-desc'])) {

                    $plats = new Plat($dsn);
                    $plats->setPlat($_POST['plat' . strval($j)], $_POST['plat' . strval($j) . '-desc'], strval('plat' . $j));
                    $platsDatas = $plats->getPlatInputs();
                    $stmt = $plats->registerPlat($menuid, $platsDatas);
                }
            }
            // DESSERTS -> to database
            for ($k = 1; $k <= 3; $k++) {
                if (isset($_POST['dessert' . strval($k)]) && !empty($_POST['dessert' . strval($k)]) && isset($_POST['dessert' . strval($k) . '-desc']) && !empty($_POST['dessert' . strval($k) . '-desc'])) {

                    $desserts = new Dessert($dsn);
                    $desserts->setDessert($_POST['dessert' . strval($k)], $_POST['dessert' . strval($k) . '-desc'], strval('dessert' . $k));
                    $dessertsDatas = $desserts->getDessertInputs();
                    $stmt = $desserts->registerDessert($menuid, $dessertsDatas);
                }
            }

            $pdo->commit();
        } catch (PDOException $e) {
            if ($dsn) {
                $pdo->rollBack();
                echo 'Erreur : ' . $e->getCode() . '<br>';
                echo 'Erreur : ' . $e->getMessage() . '<br>';
                echo $e->getLine();
            }
            die();
        }


        header('Location: /demos/compte');
    }

        ?>

        </div>


        <script src="/src/js/restaurant-manager.js"></script>
</body>

</html>
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

if (isset($_GET['color-submit']) && $_SERVER['REQUEST_METHOD'] === 'GET') {

    // value list :
    $restaurant_properties = [];
    $restaurant_properties['restaurantId']          = intval($_GET['restaurant_id']);
    $restaurant_properties['mainColor']             = $_GET['main-color'];
    $restaurant_properties['secondColor']           = $_GET['second-color'];
    $restaurant_properties['brandColor']            = $_GET['brand-color'];
    $restaurant_properties['doorColor']             = $_GET['door-color'];
    $restaurant_properties['secondDoorColor']       = $_GET['second-door-color'];
    $restaurant_properties['mouluresColor']         = $_GET['moulures-color'];
    $restaurant_properties['bordersMouluresColor']  = $_GET['borders-moulures-colors'];
    $restaurant_properties['poigneeColor']          = $_GET['poignee-color'];
}

/* Enregistrer les données du formulaire des couleurs

Include le restaurant choisi
appeler les données pour colorer le restaurant
inclure formulaire pour le choix du nom
+ formulaire du menu

*/

// GET RESTAURANT SVG ACCORDING TO THE RESTAURANT ID
//ex:
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

    <div class="restaurant-texts">

        <div class="display-colored-rest">
            <?php
            include "partials/restaurants/restaurant_" . $restaurant_properties['restaurantId'] . ".php";
            ?>
        </div>

        <form method="post" action="" class="form-colors">
            <fieldset>

                <label for="restaurant-name">Le nom du restaurant (20 caractères maximum) : </label>
                <input type="text" id="restaurant-name" name="restaurant-name" value="" maxlength="20" />
                <label for="restaurant-name-font">Choisissez une police d'écriture :</label>
                <select id="font-select-input">
                    <option value="" selected>Sélectionnez dans la liste</option>
                    <option value="kapakana">Kapakana</option>
                    <option value="arial">Arial</option>
                </select>
                <label for="restaurant-name-color">La couleur du nom : </label>
                <input type="color" id="restaurant-name-color" name="restaurant-name-color" value="#000000" />
            </fieldset>
            <fieldset>

                <fieldset class="menu-fields">
                    <legend>Définir une ou plusieurs entrées</legend>
                    <!-- ENTREE 1 -->
                    <label for="entree1"> Entrée 1 :</label>
                    <input type="text" id="entree1" name="entree1" value="" maxlength="50" />
                    <label for="entree1-desc"> Description :</label>
                    <textarea id="entree1-desc" name="entree1-desc" value="" maxlength="150"></textarea>

                    <!-- ENTREE 2 -->
                    <label for="entree2"> Entrée 2 :</label>
                    <input type="text" id="entree2" name="entree2" value="" maxlength="50" />
                    <label for="entree2-desc"> Description :</label>
                    <textarea id="entree2-desc" name="entree2-desc" value="" maxlength="150"></textarea>

                    <!-- ENTREE 3 -->
                    <label for="restaurant-name"> Entrée 3 :</label>
                    <input type="text" id="entree3" name="entree3" value="" maxlength="50" />
                    <label for="entree3-desc"> Description :</label>
                    <textarea id="entree3-desc" name="entree3-desc" value="" maxlength="150"></textarea>

                    <input class="btn submit-btn" type="submit" name="entrees-submit" value="Valider le/les entrées" />

                </fieldset>
                <fieldset class="menu-fields">
                    <legend>Définir un ou plusieurs plats</legend>
                    <!-- PLAT 1 -->
                    <label for="plat1"> Plat 1 :</label>
                    <input type="text" id="plat1" name="plat1" value="" maxlength="50" />
                    <label for="plat1-desc"> Description :</label>
                    <textarea id="plat1-desc" name="plat1-desc" value="" maxlength="150"></textarea>

                    <!-- PLAT 2 -->
                    <label for="plat2"> Plat 2 :</label>
                    <input type="text" id="plat2" name="plat2" value="" maxlength="50" />
                    <label for="plat2-desc"> Description :</label>
                    <textarea id="plat2-desc" name="plat2-desc" value="" maxlength="150"></textarea>

                    <!-- PLAT 3 -->
                    <label for="plat3"> Plat 3 :</label>
                    <input type="text" id="plat3" name="plat3" value="" maxlength="50" />
                    <label for="plat3-desc"> Description :</label>
                    <textarea id="plat3-desc" name="plat3-desc" value="" maxlength="150"></textarea>

                    <input class="btn submit-btn" type="submit" name="plats-submit" value="Valider le/les plats" />

                </fieldset>
                <fieldset class="menu-fields">
                    <legend>Définir un ou plusieurs desserts :</legend>
                    <!-- PLAT 1 -->
                    <label for="dessert1"> Dessert 1 :</label>
                    <input type="text" id="dessert1" name="dessert1" value="" maxlength="50" />
                    <label for="dessert1-desc"> Description :</label>
                    <textarea id="dessert1-desc" name="dessert1-desc" value="" maxlength="150"></textarea>

                    <!-- PLAT 2 -->
                    <label for="dessert2"> Dessert 2 :</label>
                    <input type="text" id="dessert2" name="dessert2" value="" maxlength="50" />
                    <label for="dessert2-desc"> Description :</label>
                    <textarea id="dessert2-desc" name="dessert2-desc" value="" maxlength="150"></textarea>

                    <!-- PLAT 3 -->
                    <label for="dessert3"> Dessert 3 :</label>
                    <input type="text" id="dessert3" name="dessert3" value="" maxlength="50" />
                    <label for="dessert3-desc"> Description :</label>
                    <textarea id="dessert3-desc" name="dessert3-desc" value="" maxlength="150"></textarea>

                    <input class="btn submit-btn" type="submit" name="desserts-submit" value="Valider le/les desserts" />

                </fieldset>

            </fieldset>
        </form>
    </div>


    <script src="/src/js/restaurant-manager.js"></script>
</body>

</html>
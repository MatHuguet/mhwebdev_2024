<?php

$user_entrees = new Entree($dsn);
$user_plats = new Plat($dsn);
$user_desserts = new Dessert($dsn);

$user_restaurant = new Restaurant($dsn);
$user_menu = new Menus($dsn);
$get_restaurant = $user_restaurant->getRestaurant($userid);
$get_menu = $user_menu->getMenu($get_restaurant[0]['restaurant_id']);

$get_entrees = $user_entrees->getEntrees($get_menu[0]['menu_id']);
$get_plats = $user_plats->getPlats($get_menu[0]['menu_id']);
$get_desserts = $user_desserts->getDesserts($get_menu[0]['menu_id']);

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
            <input onkeyup="checkEntreeFields()" type="text" id="entree1" name="entree1"
                value="<?= isset($get_entrees[0]['entree_name']) ? $get_entrees[0]['entree_name'] : '' ?>"
                maxlength="50" required />
            <label for="entree1-desc"> Description :</label>
            <textarea onkeyup="checkEntreeFields()" id="entree1-desc" name="entree1-desc" value="" maxlength="150"
                required><?= isset($get_entrees[0]['entree_desc']) ? $get_entrees[0]['entree_desc'] : '' ?></textarea>

            <!-- ENTREE 2 -->
            <label for="entree2"> Entrée 2 :</label>
            <input onkeyup="checkEntreeFields()" type="text" id="entree2" name="entree2"
                value="<?= isset($get_entrees[1]['entree_name']) ? $get_entrees[1]['entree_name'] : '' ?>"
                maxlength="50" />
            <label for="entree2-desc"> Description :</label>
            <textarea onkeyup="checkEntreeFields()" id="entree2-desc" name="entree2-desc" value=""
                maxlength="150"><?= isset($get_entrees[1]['entree_desc']) ? $get_entrees[1]['entree_desc'] : '' ?></textarea>

            <!-- ENTREE 3 -->
            <label for="restaurant-name"> Entrée 3 :</label>
            <input type="text" id="entree3" name="entree3"
                value="<?= isset($get_entrees[2]['entree_name']) ? $get_entrees[2]['entree_name'] : '' ?>"
                maxlength="50" />
            <label for="entree3-desc"> Description :</label>
            <textarea id="entree3-desc" name="entree3-desc"
                value="<?= isset($get_entrees[2]['entree_desc']) ? $get_entrees[2]['entree_desc'] : '' ?>"
                maxlength="150"></textarea>

        </fieldset>
        <fieldset class="menu-fields">
            <legend>Définir un ou plusieurs plats</legend>
            <!-- PLAT 1 -->
            <label for="plat1"> Plat 1 :</label>
            <input onkeyup="checkPlatFields()" 
                    type="text" 
                    id="plat1" 
                    name="plat1"
                    maxlength="50"
                    value="
<?= isset($get_plats[0]['plat_name']) ? $get_plats[0]['plat_name'] : '' ?>"/>
            <label for="plat1-desc"> Description :</label>
            <textarea onkeyup="checkPlatFields()" 
                        id="plat1-desc" 
                        name="plat1-desc"
                        maxlength="150"
            value=""><?= isset($get_plats[0]['plat_desc']) ? $get_plats[0]['plat_desc'] : '' ?>
            </textarea>
            <!-- PLAT 2 -->
            <label for="plat2"> Plat 2 :</label>
            <input onkeyup="checkPlatFields()" type="text" id="plat2" name="plat2" value="<?= isset($get_plats[1]['plat_name']) ? $get_plats[1]['plat_name'] : '' ?>" maxlength="50" />
            <label for="plat2-desc"> Description :</label>
            <textarea onkeyup="checkPlatFields()" id="plat2-desc" name="plat2-desc"
                value="<?= isset($get_plats[1]['plat_name']) ? $get_plats[1]['plat_name'] : '' ?>"
                maxlength="150"><?= isset($get_plats[1]['plat_desc']) ? $get_plats[1]['plat_desc'] : '' ?></textarea>

            <!-- PLAT 3 -->
            <label for="plat3"> Plat 3 :</label>
            <input type="text" id="plat3" name="plat3"
                value="<?= isset($get_plats[2]['plat_name']) ? $get_plats[2]['plat_name'] : ''  ?>" maxlength="50" />
            <label for="plat3-desc"> Description :</label>
            <textarea id="plat3-desc" name="plat3-desc" value=""
                maxlength="150"><?= isset($get_plats[2]['plat_desc']) ? $get_plats[2]['plat_desc'] : '' ?></textarea>
        </fieldset>
        <fieldset class="menu-fields">
            <legend>Définir un ou plusieurs desserts :</legend>
            <!-- DESSERT 1 -->
            <label for="dessert1"> Dessert 1 :</label>
            <input onkeyup="checkDessertFields()" type="text" id="dessert1" name="dessert1"
                value="<?= isset($get_desserts[0]['dessert_name']) ? $get_desserts[0]['dessert_name'] : ''  ?>"
                maxlength="50" required />
            <label for="dessert1-desc"> Description :</label>
            <textarea onkeyup="checkDessertFields()" id="dessert1-desc" name="dessert1-desc" value="" maxlength="150"
                required><?= isset($get_desserts[0]['dessert_desc']) ? $get_desserts[0]['dessert_desc'] : '' ?></textarea>

            <!-- DESSERT 2 -->
            <label for="dessert2"> Dessert 2 :</label>
            <input onkeyup="checkDessertFields()" type="text" id="dessert2" name="dessert2"
                value="<?= isset($get_desserts[1]['dessert_name']) ? $get_desserts[1]['dessert_name'] : '' ?>"
                maxlength="50" />
            <label for="dessert2-desc"> Description :</label>
            <textarea onkeyup="checkDessertFields()" id="dessert2-desc" name="dessert2-desc" value=""
                maxlength="150"><?= isset($get_desserts[1]['dessert_desc']) ? $get_desserts[1]['dessert_desc'] : '' ?></textarea>

            <!-- DESSERT 3 -->
            <label for="dessert3"> Dessert 3 :</label>
            <input type="text" id="dessert3" name="dessert3"
                value="<?= isset($get_desserts[2]['dessert_name']) ? $get_desserts[2]['dessert_name'] : '' ?>"
                maxlength="50" />
            <label for="dessert3-desc"> Description :</label>
            <textarea id="dessert3-desc" name="dessert3-desc" value=""
                maxlength="150"><?= isset($get_desserts[2]['dessert_desc']) ? $get_desserts[2]['dessert_desc'] : '' ?></textarea>

        </fieldset>

    </fieldset>

    <input class="btn submit-btn" type="submit" name="modify-menu" value="Modifier le menu" />

</form>

<?php


if (isset($_POST['modify-menu']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

    try {

        $pdo = $dsn->getPdo();
        $pdo->beginTransaction();

        // ENTREES -> to database
        for ($i = 1; $i <= 3; $i++) {
            if (isset($_POST['entree' . strval($i)]) && !empty($_POST['entree' . strval($i)]) ) {

                $entrees = new Entree($dsn);
                $entrees->setEntree($_POST['entree' . strval($i)], $_POST['entree' . strval($i) . '-desc'], strval('entree' . $i));
                $entreesDatas = $entrees->getEntreeInputs();
                $entree = $entrees->getEntreeFromId(strval('entree' . $i));
                if (!empty($entree)) {
                $stmt = $entrees->updateEntree($get_menu[0]['menu_id'], $entreesDatas);
                } else {
                $stmt = $entrees->registerEntree($get_menu[0]['menu_id'], $entreesDatas);
                }
            }
        }
        // PLATS -> to database
        for ($j = 1; $j <= 3; $j++) {
            if (isset($_POST['plat' . strval($j)]) && !empty($_POST['plat' . strval($j)])) {

                $plats = new Plat($dsn);
                $plats->setPlat($_POST['plat' . strval($j)], $_POST['plat' . strval($j) . '-desc'], strval('plat' . $j));
                $platsDatas = $plats->getPlatInputs();
                $plat = $plats->getPlatFromId(strval('plat' . $j));
                if (!empty($plat)) {
                $stmt = $plats->updatePlat($get_menu[0]['menu_id'], $platsDatas);
                } else {
                $stmt = $plats->registerPlat($get_menu[0]['menu_id'], $platsDatas);
                }
            }
        }
        // DESSERTS -> to database
        for ($k = 1; $k <= 3; $k++) {
            if (isset($_POST['dessert' . strval($k)]) && !empty($_POST['dessert' . strval($k)])) {

                $desserts = new Dessert($dsn);
                $desserts->setDessert($_POST['dessert' . strval($k)], $_POST['dessert' . strval($k) . '-desc'], strval('dessert' . $k));
                $dessertsDatas = $desserts->getDessertInputs();
                $dessert = $desserts->getDessertFromId(strval('dessert' . $k));
                if (!empty($dessert)) {
                $stmt = $desserts->updateDessert($get_menu[0]['menu_id'], $dessertsDatas);
                } else {
                $stmt = $desserts->registerDessert($get_menu[0]['menu_id'], $dessertsDatas);
                }
            }
        }

        $pdo->commit();
                    if (!$stmt) {


                echo "<script type ='text/JavaScript'>";
                echo "window.alert('Modification(s) réussie(s)');";
                echo "window.location.href='/demos/compte'";
                echo "</script>";
            }
    } catch (PDOException $e) {
        if ($dsn) {
            $pdo->rollBack();
            echo 'Erreur : ' . $e->getCode();
            echo 'Erreur : ' . $e->getMessage();
        }
        die();
    }
}

?>
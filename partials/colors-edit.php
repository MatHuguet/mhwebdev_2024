<?php

// GET MENU
$user_menu = new Menus($dsn);
$menu = $user_menu->getMenu($restaurant_id);

// GET COLORS DATA
$colors = new Colors($dsn);
$user_colors = $colors->getColors($restaurant_id);
$restaurant_properties['restaurant_id']         = $user_colors[0]['restaurant_id'];
$restaurant_properties['mainColor']             = $user_colors[0]['main_color'];
$restaurant_properties['secondColor']           = $user_colors[0]['second_color'];
$restaurant_properties['brandColor']            = $user_colors[0]['brand_color'];
$restaurant_properties['doorColor']             = $user_colors[0]['door_color'];
$restaurant_properties['secondDoorColor']       = $user_colors[0]['door_second_color'];
$restaurant_properties['mouluresColor']         = $user_colors[0]['moulures_color'];
$restaurant_properties['bordersMouluresColor']  = $user_colors[0]['borders_moulures_color'];
$restaurant_properties['poigneeColor']          = $user_colors[0]['poignee_color'];


// UPDATE COLORS :
if (isset($_POST['restaurant-edit']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $new_menu = new Menus($dsn);
    $new_menuDatas['restaurant_id'] = $_POST['restaurant_id'];
    $new_menuDatas['name'] = $_POST['restaurant-name'];
    $new_menuDatas['welcome'] = $_POST['welcome'];
    $new_menuDatas['brand_font'] = $_POST['font'];
    $new_menuDatas['brand_color'] = $_POST['restaurant-name-color'];

    $set_menu = $new_menu->setMenu($new_menuDatas);
    $get_menu = $new_menu->getMenuInputs();

    $new_colors = new Colors($dsn);
    $new_colorsDatas['restaurant_id'] = $_POST['restaurant_id'];
    $new_colorsDatas['mainColor'] = $_POST['mainColor'];
    $new_colorsDatas['secondColor'] = $_POST['secondColor'];
    $new_colorsDatas['brandColor'] = $_POST['brandColor'];
    $new_colorsDatas['mouluresColor'] = $_POST['mouluresColor'];
    $new_colorsDatas['bordersMouluresColor'] = $_POST['bordersMouluresColor'];
    $new_colorsDatas['doorColor'] = $_POST['doorColor'];
    $new_colorsDatas['secondDoorColor'] = $_POST['secondDoorColor'];
    $new_colorsDatas['poigneeColor'] = $_POST['poigneeColor'];
    $set_colors = $new_colors->setColors($new_colorsDatas);
    $get_colors = $new_colors->getColorsInputs();


    if (!empty($get_colors) && !empty($get_menu)) {
        try {

            $pdo = $dsn->getPdo();
            $pdo->beginTransaction();

            $update_menus = $new_menu->updateMenu($get_menu);
            $update_colors = $new_colors->updateColors($get_colors);


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
}


?>




<form action="" method="POST" class="form-colors">
    <div class="display-colored-rest">
        <?php

        include 'partials/restaurants/restaurant_' . $restaurant_type . '.php'

        ?>
    </div>

    <fieldset>
        <input type="text" value="<?= $restaurant_properties['restaurant_id'] ?>" name="restaurant_id" hidden />
        <label for="restaurant-name">Le nom du restaurant (20 caractères maximum) : </label>
        <input type="text" id="restaurant-name" name="restaurant-name" value="<?= $menu[0]['restaurant_name'] ?>" maxlength="20" />
        <label for="restaurant-name-font">Choisissez une police d'écriture :</label>
        <select name="font" id="font-select-input">
            <option value="">Sélectionnez dans la liste</option>
            <option value="kapakana" <?php echo $menu[0]['brand_font'] == 'kapakana' ? 'selected' : '' ?>>Kapakana
            </option>
            <option value="arial" <?php echo $menu[0]['brand_font'] == 'arial' ? 'selected' : '' ?>>Arial</option>
        </select>
        <label for="restaurant-name-color">La couleur du nom : </label>
        <input type="color" id="restaurant-name-color" name="restaurant-name-color" value="<?= $menu[0]['brand_color'] ?>" />
        <label for="welcome"> Texte de bienvenue :</label>
        <textarea id="welcome" name="welcome" value="" maxlength="150"><?= $menu[0]['welcome_text'] ?></textarea>

        <input type="text" name="restaurant_id" value="<?= $restaurant_id ?>" hidden />
        <input type="text" name="restaurant_type" value="<?= $restaurant_type ?>" hidden />
        <div class="input">
            <label for="maincolor">Couleur principale :
            </label>
            <input type="color" name="mainColor" id="maincolor" value="<?= $restaurant_properties['mainColor'] ?>" />
        </div>

        <input type="color" name="secondColor" id="getsecondcolor" value="<?= $restaurant_properties['secondColor'] ?>" hidden />

        <div class="input">

            <label for="brandcolor">Couleur de l'écriteau :
            </label>
            <input type="color" name="brandColor" id="brandcolor" value="<?= $restaurant_properties['brandColor'] ?>" />
        </div>
        <div class="input">

            <label for="doormaincolor">Porte :
            </label>
            <input type="color" name="doorColor" id="doormaincolor" value="<?= $restaurant_properties['doorColor'] ?>" />
        </div>
        <input type="color" name="secondDoorColor" id="getseconddoorcolor" value="<?= $restaurant_properties['secondDoorColor'] ?>" hidden />

        <div class="input">

            <label for="moulurescolor">Moulures :
            </label>
            <input type="color" name="mouluresColor" id="moulurescolor" value="<?= $restaurant_properties['mouluresColor'] ?>" />
        </div>

        <div class="input">

            <label for="bordermoulurescolors">Bordures de moulures :
            </label>
            <input type="color" name="bordersMouluresColor" id="bordermoulurescolors" value="<?= $restaurant_properties['bordersMouluresColor'] ?>" />
        </div>

        <div class="input">

            <label for="doorpoignee">Poignée :
            </label>
            <input type="color" name="poigneeColor" id="doorpoignee" value="<?= $restaurant_properties['poigneeColor'] ?>" />
        </div>
    </fieldset>
    <input class="btn submit-btn" type="submit" name="restaurant-edit" value="Modifier les couleurs" />


</form>
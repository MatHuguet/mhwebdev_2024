<?php

$user_restaurant = new Restaurant($dsn);
$user_menu = new Menus($dsn);
$get_restaurant = $user_restaurant->getRestaurant($userid);
$get_menu = $user_menu->getMenu($get_restaurant[0]['restaurant_id']);



if (isset($_POST['delete']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

    try {

    $user_restaurant->deleteRestaurant($get_restaurant[0]['restaurant_id']);
                    echo "<script type ='text/JavaScript'>";
                echo "window.alert('Restaurant supprimé avec succès');";
                echo "window.location.href='/demos/compte'";
                echo "</script>";

} catch (PDOException $e) {

    echo 'Une erreur est survenue';
    echo $e->getMessage() . '<br>';
    echo $e->getCode() . '<br>';
    die();
}

}


?>
<div class="delete-container">
<h2>Êtes-vous sûr(e) de vouloir supprimer votre restaurant ?</h2>
<form action="" method="POST">
<fieldset>
<legend>Supprimer le restaurant</legend>
<div class="btn-container">
    <label for="return">Annuler et retourner au compte</label>
    <a href="/demos/compte"><button type="button" class="btn submit-btn-white" id="cancel">Annuler</button></a>
<hr style="width:50%;text-align:left;margin-left:0">
    <label for="delete">Supprimer définitivement votre restaurant</label>
    <button type="submit" class="btn btn-alert" id="delete" name="delete">Suppimer</button>

</div>
</fieldset>
</form>
</div>
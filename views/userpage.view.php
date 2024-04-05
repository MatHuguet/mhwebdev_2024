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


// CHECK IF USER ALREADY HAS A RESTAURANT
$userRestaurant  = new Restaurant($dsn);
$restaurantDatas = $userRestaurant->getRestaurant($userid);


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
    ?>


    <?php




    if ($restaurantDatas) {
        // DISPLAY RESTAURANT AND MENU + EDIT AND DELETE OPTIONS
        //get datas to display :

        $restaurant = [];
        $restaurant['type']    = $restaurantDatas[0]['restaurant_type'];
        $restaurant['id']      = $restaurantDatas[0]['restaurant_id'];


        //get colors :
        $colors = new Colors($dsn);
        $userRestaurantColors = $colors->getColors($restaurant['id']);

        $restaurant_properties['mainColor']             = $userRestaurantColors[0]['main_color'];
        $restaurant_properties['secondColor']           = $userRestaurantColors[0]['second_color'];
        $restaurant_properties['brandColor']            = $userRestaurantColors[0]['brand_color'];
        $restaurant_properties['doorColor']             = $userRestaurantColors[0]['door_color'];
        $restaurant_properties['secondDoorColor']       = $userRestaurantColors[0]['door_second_color'];
        $restaurant_properties['mouluresColor']         = $userRestaurantColors[0]['moulures_color'];
        $restaurant_properties['bordersMouluresColor']  = $userRestaurantColors[0]['borders_moulures_color'];
        $restaurant_properties['poigneeColor']          = $userRestaurantColors[0]['poignee_color'];

        $user_menu = new Menus($dsn);
        $menu = $user_menu->getMenu($restaurant['id']);
    ?>
    <div class="display-userrest">

        <div class="welcome-user">

            <h2>Bienvenue sur votre page <?= ucfirst($userDatas[0]['user_firstname']) ?></h2>
            <p>Voici le restaurant que vous avez créé</p>

        </div>
        <!-- Display restaurant pics : -->
        <div class="display-colored-rest">
            <?php
                include 'partials/restaurants/restaurant_' . $restaurant['type'] . '.php';
                ?>
        </div>
        <div class="btn-container">

            <a href="/demos/edit?edit=0"><button type="submit" class="btn submit-btn btn-l">Modifier le titre, le texte
                    d'accueil et les
                    couleurs</button></a>
        </div>
        <div class="welcome-user">
            <p>Le menu de votre restaurant :</p>

        </div>
        <div class="user-menu">

            <div class="menu-container">
                <h3 class="<?php echo $menu[0]['brand_font'] ? $menu[0]['brand_font'] : 'default-font' ?>">Menu</h3>
                <p class="welcome-text"><?= $menu[0]['welcome_text'] ?></p>
                <hr style="width:50%;text-align:left;margin-left:0">
                <!-- ENTREES -->
                <?php
                    $getentrees = new Entree($dsn);
                    $entrees = $getentrees->getEntrees($menu[0]['menu_id']);
                    $entreesLength = count($entrees);
                    ?>
                <h4>Les entrées :</h4>
                <ul class="menu-list">
                    <?php
                        for ($i = 0; $i < $entreesLength; $i++) {
                        ?>

                    <li class="menu-item"><strong><?= $entrees[$i]['entree_name'] ?></strong></li>
                    <p class="menu-item-desc"><?= $entrees[$i]['entree_desc'] ?></p>

                    <?php
                        }
                        ?>
                </ul>
                <hr style="width:50%;text-align:left;margin-left:0">
                <!-- Plats -->
                <?php
                    $getplats = new Plat($dsn);
                    $plats = $getplats->getPlats($menu[0]['menu_id']);
                    $platsLength = count($plats);
                    ?>
                <h4>Les plats :</h4>
                <ul class="menu-list">
                    <?php
                        for ($i = 0; $i < $platsLength; $i++) {
                        ?>

                    <li class="menu-item"><strong><?= $plats[$i]['plat_name'] ?></strong></li>
                    <p class="menu-item-desc"><?= $plats[$i]['plat_desc'] ?></p>

                    <?php
                        }
                        ?>
                </ul>
                <hr style="width:50%;text-align:left;margin-left:0">
                <!-- Desserts -->
                <?php
                    $getdesserts = new Dessert($dsn);
                    $desserts = $getdesserts->getDesserts($menu[0]['menu_id']);
                    $dessertsLength = count($desserts);
                    ?>
                <h4>Les desserts :</h4>
                <ul class="menu-list">
                    <?php
                        for ($i = 0; $i < $dessertsLength; $i++) {
                        ?>

                    <li class="menu-item"><strong><?= $desserts[$i]['dessert_name'] ?></strong></li>
                    <p class="menu-item-desc"><?= $desserts[$i]['dessert_desc'] ?></p>

                    <?php
                        }
                        ?>
                </ul>
                <hr style="width:50%;text-align:left;margin-left:0">
                <div class="btn-container">
                    <a href="/demos/edit?edit=1"><button type="submit" class="btn submit-btn btn-l">Modifier le
                            menu</button></a>
                    <a href="/demos/edit?edit=2"><button type="submit" class="btn btn-alert btn-l">Supprimer le
                            Restaurant</button></a>

                </div>
            </div>

        </div>
    </div>
    <?php
    } else {
        // DISPLAY WELCOME MESSAGE and GOTO RESTAURANT CREATION PAGE

        if (isset($_POST['gotoresto']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            header("Location: /demos/compte/restaurant");
        }

    ?>

    <main class="userpage">
        <div class="dashboard-container">

            <h2>Bienvenue sur votre page <?= ucfirst($userDatas[0]['user_firstname']) ?></h2>



            <p class="p-title">Vous pouvez désormais participer à la démonstration !</p>
            <p>Quoi de mieux pour vous prouver mes compétences que de vous mettre dans la peau d'un créateur de contenu
                ?</p><br>
            <p>
                Ici pas d'article ou de photographie de vos animaux préférés. Je vous propose d'imaginer ce à quoi
                ressemblerait <strong>votre restaurant</strong>, et de créer de toute pièce un menu qui y sera associé,
                de l'entrée au dessert.
            </p>
            <ul>
                <li>Vous aurez tout d'abord le choix entre plusieurs styles de restaurants. </li>
                <li>Vous devrez ensuite le colorer à votre guise à l'aide des différents boutons qui vous aideront à
                    choisir vos
                    couleurs favorites.</li>
                <li>Que serait un restaurant sans un nom original ? inventez le vôtre !</li>
                <li>Enfin, créez votre menu et décrivez vos plat afin faire saliver les visiteurs ! Faites parler votre
                    personnalité, partager vos plats plein de créativité, ou sinon de votre menu de rêve, du fast food
                    au gastronomique...</li>
            </ul>

            <p>Une fois votre restaurant créé, il apparaîtra auprès des visiteurs sur la page démo. </p>
            <p>Ce texte de bienvenue laissera la place à l'outil de modifications, qui vous permettra d'affiner vos
                menus, de les modifier, de changer les couleurs du restaurant, ou tout simplement de le supprimer.</p>
            <p class="p-title"><strong>Prêt à relever le défi ?<strong></p>

            <form action="" method="post">

                <button type="submit" class="btn submit-btn" name="gotoresto">Créer
                    !!!</button>

            </form>

        </div>
    </main>
    <?php
    }
    ?>

</body>

</html>
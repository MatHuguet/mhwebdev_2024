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

if (isset($_POST['gotoresto']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    header("Location: /demos/compte/restaurant");
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
    <title>Inscription - Mathieu Huguet - Développeur Web</title>
</head>

<body>

    <?php
    include 'partials/demo-navbar.php';
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

</body>

</html>
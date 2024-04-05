<?php
session_start();
global $dsn;

$user = new Users($dsn);
$userid = '';

// SECURITY :
/*

Check if a restaurant exists :
    true : get the id to throw to the next page
    //!!! IF THE ID CHANGE

*/


// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id']) && !isset($_SESSION['user'])) {
    header('Location: /demos/login');
    exit;
} else {
    $userid = $_SESSION['user_id'];

}


if (isset($_POST['delete']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

    try {

    $user->deleteUser($userid);
                $session = new Auth($_SESSION);
                $session->logout($_SESSION, false);
                echo "<script type ='text/JavaScript'>";
                echo "window.alert('Compte supprimé avec succès');";
                echo "window.location.href='/demos'";
                echo "</script>";

} catch (PDOException $e) {

    echo 'Une erreur est survenue';
    echo $e->getMessage() . '<br>';
    echo $e->getCode() . '<br>';
    die();
}

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
    <title>Créez votre restaurant - Mathieu Huguet - Développeur Web</title>
</head>

<body>

    <?php
    include 'partials/demo-navbar.php';

    ?>
<div class="delete-container">
<h2>Êtes-vous sûr(e) de vouloir supprimer votre compte ?</h2>
<form action="" method="POST">
<fieldset>
<legend>Supprimer le compte</legend>
<div class="btn-container">
    <label for="return">Annuler et retourner au compte</label>
    <a href="/demos/compte"><button type="button" class="btn submit-btn-white" id="cancel">Annuler</button></a>
<hr style="width:50%;text-align:left;margin-left:0">
    <label for="delete">Supprimer votre compte</label>
    <button type="submit" class="btn btn-alert" id="delete" name="delete">Suppimer</button>

</div>
</fieldset>
</form>
</div>
    <script src="/src/js/user-form.js"></script>
</body>
</html>
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
    $userDatas = $user->getUser($userid);
    $userpass = $userDatas[0]['user_password'];
}

// get restaurant id after user choice
$id = filter_input(INPUT_GET, "style", FILTER_VALIDATE_INT);
$restaurant_type = intval($id);


if (isset($_POST['modify-user-info']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $user = new Users($dsn);
    // get datas :
    $newUserDatas['email'] = $_POST['email'];


    if (!empty($_POST['password'])) {
    $newUserDatas['password'] = $_POST['password'];
    } else {
    $newUserDatas['password'] = '';
    }
    
    switch ($_POST['visibility']) {
    case 'public':
        $newUserDatas['isAnonyme'] = 0;
        $newUserDatas['isPseudo'] = 0;
        $newUserDatas['pseudo'] = null;
        break;
    case 'anonyme':
        $newUserDatas['isAnonyme'] = 1;
        $newUserDatas['isPseudo'] = 0;
        $newUserDatas['pseudo'] = null;
        break;
    case 1 :
        $newUserDatas['isAnonyme'] = 0;
        $newUserDatas['isPseudo'] = 1;
        $newUserDatas['pseudo'] = $_POST['pseudo'];
        break;
}
    $user->initUpdateUser($newUserDatas);
    $getNewSet = $user->getUserInputs();

    try {

    $updateUser = $user->updateUser($userid, $getNewSet);
    if (!$updateUser) {
        if (!empty($_POST['password'])) {
                echo "<script type ='text/JavaScript'>";
                echo "window.alert('Modification(s) de compte réussie(s)');";
                echo "window.location.href='/demos/login'";
                echo "</script>";
}
                echo "<script type ='text/JavaScript'>";
                echo "window.alert('Modification(s) de compte réussie(s)');";
                echo "window.location.href='/demos/compte'";
                echo "</script>";
    }

    } catch (PDOException $e) {

    echo 'Une erreur est survenue : ' . $e->getMessage();

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
<div class="user-modify-container">
<h2>Modifier vos informations :</h2>

<form class="user-edit-form" action="" method="POST">
<fieldset>
    <legend>Informations personnelles</legend>
    <div class="user-edit-input">
        <label for="id">Identifiant de compte :</label>
        <input  type="text" 
                value="<?= $userDatas[0]['user_id'] ?>" 
                id="id" 
                name="id" 
                disabled />
    </div>
    <div class="user-edit-input">
        <label for="lastname">Nom d'utilisateur :</label>
        <input  type="text" 
                value="<?= ucfirst($userDatas[0]['user_lastname']) ?>" 
                id="lastname" 
                name="lastname" 
                disabled />
    </div>
    <div class="user-edit-input">
    <label for="firstname">Prénom d'utilisateur : </label>
    <input  type="text" 
            value="<?= ucfirst($userDatas[0]['user_firstname']) ?>" 
            id="firstname" 
            name="firstname" 
            disabled />
    </div>
    <br>
    <hr style="width:50%;text-align:left;margin-left:0">
    <br>
    <h3>Informations modifiables :</h3>
    <br>
    <div class="user-edit-input">
        <label for="email">Email associé :</label>
        <input  type="text" 
                value="<?= $userDatas[0]['user_email'] ?>" 
                id="email" 
                name="email" 
                />
    </div>
    <div class="user-edit-input">
        <label for="password">Changer le mot de passe :</label>
        <input  type="password" 
                value="" 
                id="password" 
                name="password"
                placeholder="**********"
                />
    </div>
</fieldset>
<fieldset>
    <legend>Visibilité</legend>
            <div class="input-container" id="radio-input">
                <label for="visibility1">Afficher prénom et initial du nom</label>
                <input class="radio" type="radio" id="visibility1" name="visibility" value="public" checked required>
            </div>
            <div class="input-container" id="radio-input">
                <label for="visibility2">Apparaître en "anonyme"</label>
                <input class="radio" type="radio" id="visibility2" name="visibility" value="anonyme" required>
            </div>
            <div class="input-container" id="radio-input">
                <label for="visibility3">Apparaître sous un pseudo</label>
                <input class="radio" type="radio" id="visibility3" name="visibility" value="1" required>
            </div>

            <div class="input-container pseudo-input" id="pseudo-container">
                <label for="pseudo">Définir un pseudo :</label>
                <input type="text" id="pseudo" name="pseudo" disabled>
            </div>

<div class="btn-container">
    <input type="submit" class="btn submit-btn btn-l" value="Modier les informations" name="modify-user-info"/>
</div>
</fieldset>
</form>
<h3>Supprimer votre compte</h3>
<br>
<a href="/demos/compte/delete"><button class="btn btn-alert btn-l" type="button">Supprimer le compte</button></a>

</div>
    <script src="/src/js/user-form.js"></script>
</body>
</html>
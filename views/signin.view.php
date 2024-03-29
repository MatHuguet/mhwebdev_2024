<?php
global $dsn;

$message = '';


if (isset($_POST) && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $user = new Users($dsn);


    $userSanitizeInputs['firstname'] = FILTER_SANITIZE_FULL_SPECIAL_CHARS;
    $userSanitizeInputs['lastname'] = FILTER_SANITIZE_FULL_SPECIAL_CHARS;
    $userSanitizeInputs['email'] = FILTER_SANITIZE_EMAIL;
    $isPseudo = 0;
    $isAnonyme = 0;
    $pseudo = '';
    if (isset($_POST['visibility'])) {
        if ($_POST['visibility'] != 'public') {
            if ($_POST['visibility'] === 'anonyme') {
                $isAnonyme = 1;
            } else {
                $isPseudo = 1;
            }
        }
    }

    if ($isPseudo === 1 && isset($_POST['pseudo'])) {
        $pseudo = $_POST['pseudo'];
        $userInput['pseudo'] = $pseudo;
    }

    $userSanitizeInputs['isPseudo'] = FILTER_SANITIZE_NUMBER_INT;
    $userSanitizeInputs['isAnonyme'] = FILTER_SANITIZE_NUMBER_INT;
    $userSanitizeInputs['pseudo'] = FILTER_SANITIZE_FULL_SPECIAL_CHARS;

    $userInput['firstname'] = $_POST['firstname'];
    $userInput['lastname'] = $_POST['lastname'];
    $userInput['email'] = $_POST['email'];
    $userInput['isPseudo'] = $isPseudo;
    $userInput['isAnonyme'] = $isAnonyme;



    $password = $_POST['password'];

    $sanitized = filter_var_array($userInput, $userSanitizeInputs);
    $sanitized['password'] = $password;


    $user->setUser($sanitized);
    $userDatas = $user->getUserInputs();
    $result = $user->register($userDatas);

    if ($result === 1062) {
        $message = 'Un compte avec le mail existe déjà';
    } else {
        $message = 'Inscription réussie!';
        header('Location: /demos/login');
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
    <title>Inscription - Mathieu Huguet - Développeur Web</title>
</head>

<body>

    <?php

    include 'partials/demo-navbar.php';

    ?>


    <div class="signin-container">
        <h2>Inscription</h2>

        <?php if (!empty($message)) : ?>
            <p style="color:red"><?= $message ?></p>
        <?php endif; ?>

        <form class="signin-login-form" action="" method="post">

            <div class="input-container">
                <label for="lastname">Nom :</label>
                <input type="text" id="lastname" name="lastname" required>
            </div>

            <div class="input-container">
                <label for="firstname">Prénom :</label>
                <input type="text" id="firstname" name="firstname" required>
            </div>

            <div class="input-container">
                <label for="email">Adresse e-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-container">
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password">
            </div>

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


            <p class="p-info">Vous avez déjà un compte ? <a class="redirect" href="/demos/login">connectez-vous</a></p>

            <div class="submit-container">
                <input class="btn submit-btn" type="submit" value="S'inscrire">
            </div>
        </form>
    </div>

    <script src="/src/js/user-form.js"></script>
</body>

</html>
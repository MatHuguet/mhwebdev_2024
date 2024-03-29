<?php
global $dsn;
$user = new Users($dsn);

$message = '';


if (isset($_POST['email']) && isset($_POST['password']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userRecords = $user->getUser(null, $email);


    if ($email === $userRecords[0]['user_email'] && password_verify($password, $userRecords[0]['user_password'])) {
        $id = $userRecords[0]['user_id'];
        session_start();
        $_SESSION['user_id'] = $id;
        $_SESSION['user']    = $userRecords[0]['user_firstname']  . ' ' . $userRecords[0]['user_lastname'];
        header("Location: /demos/compte");
    } else {
        $message = 'Identifiants ou mot de passe incorrecte ';
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
    <title>Connexion - Mathieu Huguet - Développeur Web</title>
</head>

<body>

    <?php
    include 'partials/demo-navbar.php';
    ?>

    <div class="login-container">
        <h2>Connexion</h2>

        <?php if (!empty($message)) : ?>
            <p style="color:red"><?= $message ?></p>
        <?php endif; ?>

        <form class="signin-login-form" action="" method="post">

            <div class="input-container">
                <label for="email">Email :</label>
                <input type="text" id="email" name="email">
            </div>


            <div class="input-container">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="infos">
                <p class="p-info">Vous n'avez pas de compte ? <a class="redirect" href="/demos/signin">Créer un
                        compte</a>
                </p>
                <p class="p-info">Mot de passe oublié ? <a class="redirect" href="/demos/login">Récupérer votre mot de
                        passe</a></p>
                <div class="submit-container">
                    <input class="btn submit-btn" type="submit" value="Se connecter">
                </div>

            </div>
        </form>
    </div>

</body>

</html>
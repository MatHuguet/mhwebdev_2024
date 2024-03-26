<?php

$message = '';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        header('Location: dashboard.php');
    } else {
        $message = 'Mauvais identifiants';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/styles/index.css">
    <title>Connexion - Mathieu Huguet - Développeur Web</title>
</head>

<body>

    <?php
    include 'partials/_navbar.php';
    ?>

    <div class="login-container">
        <h2>Connexion</h2>

        <?php if (!empty($message)) : ?>
            <p style="color:red"><?= $message ?></p>
        <?php endif; ?>

        <form action="login.php" method="post">
            <div>
                <label for="username">Nom d'utilisateur:</label>
                <input type="text" id="username" name="username">
            </div>

            <div>
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password">
            </div>

            <div>
                <input type="submit" value="Se connecter">
            </div>
        </form>
    </div>

</body>

</html>
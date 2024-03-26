<?php


$message = '';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $sql = "INSERT INTO users (email, username, password) VALUES (:email, :username, :password)";
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute(['email' => $email, 'username' => $username, 'password' => $password]);

    if ($result) {
        $message = 'Inscription réussie!';
        header('Location: login.php');
    } else {
        $message = 'Erreur lors de l\'inscription.';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/styles/index.css">
    <title>Inscription - Mathieu Huguet - Développeur Web</title>
</head>

<body>

    <?php
    include 'partials/_navbar.php';
    ?>

    <div class="login-container">
        <h2>Inscription</h2>

        <?php if (!empty($message)) : ?>
            <p style="color:red"><?= $message ?></p>
        <?php endif; ?>

        <form action="register.php" method="post">
            <div>
                <label for="email">Adresse e-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="username">Nom d'utilisateur:</label>
                <input type="text" id="username" name="username">
            </div>

            <div>
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password">
            </div>

            <div>
                <input type="submit" value="S'inscrire">
            </div>
        </form>
    </div>

</body>

</html>
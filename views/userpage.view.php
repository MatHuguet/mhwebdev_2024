<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
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

    <div class="dashboard-container">
        <h2>Bienvenue sur votre tableau de bord</h2>
        <p>Vous pouvez maintenant accéder à toutes les fonctionnalités réservées à nos utilisateurs inscrits.</p>
        <a href="logout.php">Se déconnecter</a>
    </div>

</body>

</html>
<?php
session_start();
$session = new Auth($_SESSION);
$session->logout($_SESSION, false);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/styles/index.css">
    <title>Accueil - Mathieu Huguet - Développeur Web</title>
</head>

<body>
    <?php
    partial("navbar");
    ?>
    <main>
        <div class="introduction">
            <h1>Mathieu<br>Huguet</h1>
            <h2>développeur web et web mobile</h2>
            <h3>fullstack</h3>
        </div>
    </main>
    <section class="description">
        <p>
            Bonjour, je suis Mathieu.<br><br>
            Pendant plus de 10 ans j'ai travaillé dans l'hôtellerie et l'événementiel,
            en commençant en tant qu'employé polyvalent de jour et de nuit dans un hôtel proche d'Angers avant d'en
            prendre la gérance.
            Je suis ensuite devenu régisseur général d'un château dans un domaine de 9 hectares accueillant des
            événements tels que des mariages, des fêtes
            de famille ainsi que des séminaires.<br><br>
            Souhaitant me tourner vers un univers qui m'attire depuis l'enfance, je décide en 2022 de me reconvertir
            professionnellement dans le
            développement informatique, et plus précisément dans le développement web.<br>
            Le code me permet de développer mon sens de la <strong>rigueur</strong>, et celui de
            <strong>l'organisation</strong>. <strong>Curieux</strong> par nature, je prends plaisir à découvrir les
            langages
            et leurs fonctionnalités. Cette apétance est enrichie par ma <strong>polyvalence</strong> qui me permet
            d'absorber rapidement de multiples informations et de
            m'adapter à mon environnement de travail.<br><br>
            Ma <strong>créativité</strong> se retrouve également mobilisée pour résoudre les multiples problèmes qui
            peuvent se poser
            lors du développement, et m'assure soit de trouver une solution, soit de contourner le problème.

        </p><br>
        <p>Je cherche aujourd'hui à intégrer le milieu professionel. Je suis prêt à mettre à profit mes <a class="intext-link" href="/cv">compétences acquises</a>, mes compétences
            futures, et à développer avec vous mon expérience au sein d'un environnement collaboratif.</p>
        <div class="cta-contact">
            <p><strong>Vous souhaitez me contacter ? c'est par ici !</strong></p>
            <a href="/contact"><button class="btn submit-btn">Me contacter</button></a>
        </div>
    </section>

    <script src="src/js/hamburger.js"></script>
</body>

</html>
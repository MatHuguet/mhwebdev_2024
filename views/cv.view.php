<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/styles/index.css">
    <title>CV</title>
</head>

<body>
<?php
partial("navbar");
?>
<main>
    <div class="introduction">
        <h1>CV</h1>
    <div class="cv-download">
        <p>Vous souhaitez télécharger mon cv au format PDF afin de le partager, l'imprimer, ou le consulter plus tard ? c'est par ici !</p>
        <a href="src/file_dwnld/cv-mathieu_huguet-dev-web-fullstack_compressed.pdf" download="cv-mathieu_huguet_dev-web-fullstack"><button class="btn submit-btn">Télécharger</button></a>
        <p>Sinon retrouvez mon parcours ainsi que mes compétences ci-dessous</p>
    </div>


    </div>
</main>
<section class="curiculum">
    <div class="cv">
        <h2>Parcours</h2>
        <!--------------------------------------------->
        <p class="cv-item-date">2022 à aujourd'hui</p>
        <ul>
            <li><strong>formation au titre professionnel de développeur web et web mobile fullstack - plateforme Studi</strong></li>
        </ul>
        <!--------------------------------------------->
        <p class="cv-item-date">2018 à 2022</p>
        <p class="cv-item-title">Régisseur Général - Domaine de Cop Choux - Mouzeil</p>
        <ul>

            <li>Maintenance des équipements</li>
            <li>Entretien intérieur/extérieur</li>
            <li>Préparation/installation d'événements type séminaire/mariage/fête de famille</li>
            <li>Gestion et coordination de prestataires</li>
        </ul>
        <!--------------------------------------------->
        <p class="cv-item-date">2016 à 2018</p>
        <p class="cv-item-title">Gérant - HôtelF1 Angers Ouest - Beaucouzé</p>
        <ul>
            <li>Réception et encaissement</li>
            <li>Clôture de caisse journalière</li>
            <li>Gestion des stocks et commandes</li>
            <li>Maintenance des équipements et entretien des locaux</li>
            <li>Gestion des conflits et application du règlement</li>
            <li>Application de pricing dynamique en fonction du remplissage</li>
            <li>Gestion RH</li>
        </ul>
        <!--------------------------------------------->
        <p class="cv-item-date">2011 à 2016</p>
        <p class="cv-item-title">Employé polyvalent - HôtelF1 Angers Ouest - Beaucouzé</p>
        <ul>
            <li>Veille de nuit</li>
            <li>Gestion des stocks</li>
            <li>Réception et encaissement des clients</li>
            <li>Entretien des locaux et du linge</li>
            <li>Préparation du buffet petit-déjeuner</li>
        </ul>
        <!--------------------------------------------->
        <p class="cv-item-date">Etudes :</p>
        <ul>
            <li>Faculté de Lettres, Langues et Sciences Humaines - Anglais (LLCE) - Angers</li>
            <li>Baccalauréat général - littéraire</li>
        </ul>
    </div>
    <div class="skills">
        <h2>Mes compétences</h2>
        <ul>
            <li>HTML</li>
            <li>CSS</li>
            <li>JavaScipt</li>
            <li>PHP</li>
            <li>PHP/PDO</li>
            <li>MySQL</li>
            <li>PostgreSQL</li>
            <li>Java</li>
            <li>---</li>
            <li>Symfony (bases)</li>
            <li>React (bases)</li>
            <li>JQuery (bases)</li>
        </ul>
    </div>
    <div class="tools">
        <h2>Mes outils</h2>
        <ul>
            <li>VS Code</li>
            <li>PhpStorm</li>
            <li>WebStorm</li>
            <li>PhpMyadmin</li>
            <li>Wamp/Laragon</li>
            <li>Figma</li>
            <li>Illustrator</li>
        </ul>
    </div>
</section>
<script src="src/js/hamburger.js"></script>
</body>

</html>
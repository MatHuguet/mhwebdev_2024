<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/styles/index.css">
    <title>Me contacter</title>
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
    <section class="user-contact-form">
        <h1 class="form-instr">Vous souhaitez me contacter ? Remplissez le formulaire ci-dessous avec votre message</h1>
        <div class="social-tel">
            <p>Vous préférez me contacter par téléphone ? <span class="tel"><strong>0687751576</strong></span></p>
            <p>Ou retrouvez moi sur
                <a class="linkedin-link" href="https://www.linkedin.com/in/mathieu-huguet-b954371b9/"> linkedin</a>
            </p>
            <!--<img src="src/img/linkedin_norm.png" alt="logo linkedin" height="60px" width="60px">-->


        </div>
        <form class="contact" method="post" action="">
            <div class="form-p1">
                <label for="forename">Votre prénom :</label>
                <input class="input" type="text" id="forename" name="forename" placeholder="prénom :" onkeyup="formControl()" required>

                <label for="surname">Votre nom :</label>
                <input class="input" type="text" id="surname" name="surname" placeholder="nom :" onkeyup="formControl()" required>

                <label for="email">Votre adresse mail :</label>
                <input class="input" type="email" id="email" name="email" placeholder="adresse mail :" onkeyup="formControl()" required>

                <label for="company">Entreprise : <span class="option">* facultatif</span> </label>
                <input class="input" type="text" id="company" name="company" placeholder="Votre entreprise :" onkeyup="formControl()">
            </div>
            <div class="form-p2">
                <label for="message">Votre message :</label>
                <textarea id="message" class="input" name="message" placeholder="Ecrivez ici votre message..." onkeyup="formControl()" required></textarea>

                <!-- captcha -->
                <div class="cap-container">

                    <p class="display-word" id="cap-word"></p>

                    <!-- user captcha to answer -->
                    <label for="user-cap">Entrez la lettre soulignée et colorée :</label>
                    <input class="input" type="text" id="user-cap" name="user-cap" maxlength="1" onkeyup="formControl()" required>

                </div>

                <label for="user_form_submit"></label>
                <button type="submit" class="btn submit-btn-greyed" id="user_form_submit" name="user_form_submit" disabled>Envoyer</button>

            </div>
        </form>
        <div class="message-display">
            <?php
            require 'src/Mailer.php';
            ?>
        </div>
    </section>
    <script src="./src/js/user-form.js"></script>
    <script src="./src/js/hamburger.js"></script>
</body>

</html>
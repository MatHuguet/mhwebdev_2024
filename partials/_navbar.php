<?php
?>
<header>
    <nav class="navbar">
        <ul class="navlist left">
            <li><img src="public/images/logo_mh2.png" alt="logo avec la lettre M et le signe hashtag"/></li>
            <li class="nav-item  <?= $_SERVER['REQUEST_URI'] == '/'? 'activ' : ''?>"><a class="navlink" href="/">accueil</a></li>
        </ul>



        <ul class="navlist right" id="right-list">
            <li class="nav-item <?= $_SERVER['REQUEST_URI'] == '/cv'? 'activ' : ''?>"><a class="navlink" href="/cv">cv</a></li>
            <!--<li class="nav-item <?= $_SERVER['REQUEST_URI'] == '/parcours'? 'activ' : ''?>"><a class="navlink" href="/parcours">parcours</a></li>-->
            <li class="nav-item <?= $_SERVER['REQUEST_URI'] == '/demos'? 'activ' : ''?>"><a class="navlink" href="/demos">demos</a></li>
            <li class="nav-item <?= $_SERVER['REQUEST_URI'] == '/contact'? 'activ' : ''?>"><a class="navlink" href="/contact">contact</a></li>

        </ul>
        <div class="hamburger-container" id="hamburger">
            <div class="top-line" id="top-line"></div>
            <div class="bottom-line" id="bottom-line"></div>
        </div>

    </nav>
    <div class="profile-photo">
    <img class="navlist profile" src="public/images/me.png" alt="photo de Mathieu Huguet"/>
    </div>
</header>
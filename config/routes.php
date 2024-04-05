<?php

return [
    '/'                         => 'Controllers/index.php',
    '/cv'                       => 'Controllers/cv.php',
    '/parcours'                 => 'Controllers/parcours.php',
    '/demos'                    => 'Controllers/demos.php',
    '/contact'                  => 'Controllers/contact.php',
    '/demos/signin'             => 'Controllers/signin.php',
    '/demos/login'              => 'Controllers/login.php',
    '/demos/logout'             => 'Controllers/logout.php',
    '/demos/compte'             => 'Controllers/userpage.php',
    '/demos/compte/restaurant'  => 'Controllers/restaurant.php',
    '/demos/compte/titre&menu'  => 'Controllers/restaurantTitreMenu.php',
    '/demos/edit'               => 'Controllers/edit.php',
    '/demos/compte/parametres'  => 'Controllers/params.php',
    '/demos/compte/delete'      => 'Controllers/delete.php',

    // get the uri :
    'uri'                       => $uri = parse_url($_SERVER['REQUEST_URI'])['path'],

];

<?php

return [
    '/'             => 'Controllers/index.php',
    '/cv'     => 'Controllers/cv.php',
    '/parcours'     => 'Controllers/parcours.php',
    '/demos'        => 'Controllers/demos.php',
    '/contact'      => 'Controllers/contact.php',
    '/signin'       => 'Controllers/signin.php',
    '/login'       => 'Controllers/login.php',

    // get the uri :
    'uri'                               => $uri = parse_url($_SERVER['REQUEST_URI'])['path'],

];

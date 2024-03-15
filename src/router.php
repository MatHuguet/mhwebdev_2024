<?php

//Get the URI
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// creating routes as an associativ array
$routes = [
    '/'             => 'Controllers/index.php',
    '/cv'     => 'Controllers/cv.php',
    '/parcours'     => 'Controllers/parcours.php',
    '/demos'        => 'Controllers/demos.php',
    '/contact'      => 'Controllers/contact.php'

];

function toController($uri, $routes):void {
    // condition to display the pages according to the URI
    if(array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        // calling abort function to redirect to 404 page or other
    abort();
    }
}

toController($uri, $routes);
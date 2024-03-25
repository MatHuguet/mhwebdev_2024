<?php


class Router
{
    function __construct($uri, $routes)
    {
        if (array_key_exists($uri, $routes)) {
            require $routes[$uri];
        }
    }
}

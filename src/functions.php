<?php


function ddump($var, $die = false): void
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    if ($die) {
        die();
    }
}

function abort($code = 404): void
{
    http_response_code($code);
    echo 'Sorry, page not found';
    die();
}

function view($pageToView): void
{
    require "views/{$pageToView}.view.php";
}

function partial($partialToInclude): void
{
    include "partials/_{$partialToInclude}.php";
}

function linkActiv($uri)
{
}

function newalert($message): void
{

    echo "<script type ='text/JavaScript'>";
    echo "window.alert(' $message ');";
    echo "window.location.href='/demos/login'";
    echo "</script>";
}

<?php

use JetBrains\PhpStorm\NoReturn;

function dd($var): void
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

#[NoReturn] function abort($code = 404): void
{
    http_response_code($code);
    echo 'Sorry, page not found';
    die();

}

function view($pageToView): void
{
    require "views/{$pageToView}.view.php";
}

function partial($partialToInclude):void {
    include "partials/_{$partialToInclude}.php";
}

function linkActiv($uri) {

}
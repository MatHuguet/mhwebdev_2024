<?php

return [
    // isDev : set to true if in dev | false if site is live (prod)
    'isDev' => true,

    //-----------------DEV CONFIG-----------------------------------------------------------------------
    'dev_sgbd'    => 'mysql',
    'dev'   => [
        'host'              => 'localhost',
        'port'              => '3306',
        'dbname'            => 'mhwebdev',
        'charset'           => 'utf8',
    ],

    'admin_dev' => [
        'user'              => 'matHu',
        'pass'              => 'Nuggyroots89',
    ],

    //---------------PROD CONFIG--------------------------------------------------------------------------
    'prod_sgbd'    => '',
    'prod' => [
        'host'              => '',
        'port'              => null,
        'charset'           => 'utf8',
        'dbname'            => '',
    ],

    'admin_prod' => [
        'user'              => '',
        'pass'              => '',
    ],
];

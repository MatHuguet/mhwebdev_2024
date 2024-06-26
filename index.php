<?php
/*
require 'src/functions.php';

require 'src/router.php';
*/
require 'src/functions.php';
$init = require 'config/db_init.php';
$routes = require 'config/routes.php';
$init_queries = require 'config/tables_init.php';
$init_tables_sql = $init_queries['sql_tables'];
$init_rows_sql = $init_queries['sql_rows'];
require 'src/classes/DatabaseInit.php';
require 'src/classes/Database.php';
require 'src/classes/Router.php';
require 'src/classes/Users.php';
require 'src/classes/Colors.php';
require 'src/classes/Menus.php';
require 'src/classes/Entree.php';
require 'src/classes/Plat.php';
require 'src/classes/Dessert.php';
require 'src/classes/Restaurant.php';
require 'src/classes/Auth.php';

$conf = $init['dev'];
$sgbd = $init['dev_sgbd'];
$admin = $init['admin_dev'];

// Database initialisation -> set dsn config
$dsn = new Database($conf, $admin);
// create app tables if not exists
$dbinit = new DatabaseInit();

$dbinit->initTables($dsn, $init_tables_sql, $init_rows_sql);


// instanciate router object
$router = new Router($routes['uri'], $routes);

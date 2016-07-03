<?php
session_start();

require __DIR__ . "/classes/Newawe.php";
require __DIR__ . "/classes/view.php";
require __DIR__ . "/classes/helpers/hash.php";
require __DIR__ . "/classes/helpers/credentials.php";
require __DIR__ . "/classes/router.php";

$DbConf = require __DIR__ . "/configs/mysql.php";

// Setup mysql connection
$mysqli = new mysqli($DbConf['host'], $DbConf['user'], $DbConf['password'], $DbConf['database']);

$newawe = new Newawe($mysqli);
$newawe->setPage(isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : "home");

$newawe->router->add("/^home/", function($view, $matches) {
    $view->setVars([]);
    echo $view->render("home");
});

echo $newawe->run();
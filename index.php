<?php
require __DIR__ . "/classes/Newawe.php";
require __DIR__ . "/classes/view.php";

$DbConf = require __DIR__."/configs/mysql.php";

// Setup mysql connection
$mysqli = new mysqli($DbConf['host'], $DbConf['user'], $DbConf['password'], $DbConf['database']);

$newawe = new Newawe($mysqli);
$newawe->setPage(isset($_GET['p']) ? $_GET['p'] : "index");
echo $newawe->render();

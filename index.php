<?php
session_start();

require __DIR__ . "/classes/Newawe.php";
require __DIR__ . "/classes/view.php";
require __DIR__ . "/classes/helpers/hash.php";
require __DIR__ . "/classes/helpers/credentials.php";

$DbConf = require __DIR__ . "/configs/mysql.php";

// Setup mysql connection
$mysqli = new mysqli($DbConf['host'], $DbConf['user'], $DbConf['password'], $DbConf['database']);

$newawe = new Newawe($mysqli);
$newawe->setPage(isset($_GET['p']) ? $_GET['p'] : "home");
echo $newawe->render();
?>
<script src="https://www.savenetneutrality.eu/widget.js"></script>

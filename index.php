<?php
require __DIR__ . "/classes/Newawe.php";
require __DIR__ . "/classes/view.php";

$newawe = new Newawe();
$newawe->setPage(isset($_GET['p']) ? $_GET['p'] : "home");
echo $newawe->render();
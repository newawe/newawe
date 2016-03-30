<?php
require __DIR__ . "/classes/Newawe.php";
require __DIR__ . "/classes/view.php";
echo ('<noscript><meta http-equiv="REFRESH" content="0;url=http://enable-javascript.com"></noscript>');

$newawe = new Newawe();
$newawe->setPage(isset($_GET['p']) ? $_GET['p'] : "index");
echo $newawe->render();

<?php
require __DIR__ . "/classes/Newawe.php";
require __DIR__ . "/classes/view.php";

if (in_array($dirs[1], $disallowed_dirs)) {
    header('HTTP/1.1 404 Not found');
    include SRV_ROOT . '/errorpages/404.php';
    die;
}

if (file_exists(SRV_ROOT . $file . 'index.php')) {
    $raw_url = $file . 'index.php';
} else if (file_exists(SRV_ROOT . $file . '/index.php')) {
    header('Location: ' . $file . '/'); die;
} else if (file_exists(SRV_ROOT . $file)) {
    $raw_url = $file;
}
if ($raw_url && $file != '/') {
    $ext = pathinfo($raw_url, PATHINFO_EXTENSION);
    switch ($ext) {
        case 'php':
            header('Content-type: text/html');
            include SRV_ROOT . $raw_url; break;
        case 'css':
            header('Content-type: text/css');
            echo file_get_contents(SRV_ROOT . $raw_url); break;
        case 'png':
            header('Content-type: image/png');
            echo file_get_contents(SRV_ROOT . $raw_url); break;
        case 'gif':
            header('Content-type: image/gif');
            echo file_get_contents(SRV_ROOT . $raw_url); break;
        case 'js':
            header('Content-type: application/javascript');
            echo file_get_contents(SRV_ROOT . $raw_url); break;
        default:
            header('HTTP/1.1 404 Not found');
            include SRV_ROOT . '/errorpages/404.php';
    }
    die;
}

$newawe = new Newawe();
$newawe->setPage(isset($_GET['p']) ? $_GET['p'] : "home");
echo $newawe->render();

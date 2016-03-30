 <?php
 define('SRV_ROOT', dirname(__FILE__));
  require __DIR__ . "/classes/Newawe.php";
  require __DIR__ . "/classes/view.php";
  
   $mysqli = new mysqli($DbConf['host'], $DbConf['user'], $DbConf['password'], $DbConf['database']);
  
 ini_set('magic_quotes_runtime', 0);
 ini_set('session.save_path', SRV_ROOT . '/data/sessions.sqlite');
 ini_set('session.save_handler', 'sqlite');
 ini_set('session.name', 'NEWAWESESSIONID');
 ini_set('session.gc_maxlifetime', 60 * 60 * 24 * 7);
 ini_set('session.cookie_lifetime', 60 * 60 * 24 * 7);
 include SRV_ROOT . '/bootstrap.php'; //get bootstrap
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
             header('Contenttype: text/html');
             include SRV_ROOT . $raw_url; break;
         case 'css':
             header('Contenttype: text/css');
             echo file_get_contents(SRV_ROOT . $raw_url); break;
         case 'png':
             header('Contenttype: image/png');
             echo file_get_contents(SRV_ROOT . $raw_url); break;
         case 'gif':
             header('Contenttype: image/gif');
             echo file_get_contents(SRV_ROOT . $raw_url); break;
         case 'js':
             header('Contenttype: application/javascript');
             echo file_get_contents(SRV_ROOT . $raw_url); break;
         default:
             header('HTTP/1.1 404 Not found');
             include SRV_ROOT . '/errorpages/404.php';
     }
     die;
 }
 $newawe = new Newawe();

require __DIR__ . "/classes/helpers/hash.php";
 require __DIR__ . "/classes/helpers/credentials.php";
 
 $DbConf = require __DIR__."/configs/mysql.php";
  // dump the buffer into a string for manipulation
    $contents = ob_get_contents();
    ob_end_clean();

    // set the appropriate content type
    if ($content_type) {
        header('Content-type: ' . $content_type);
    } else {
        header('Content-type: text/html; charset=utf-8');
    }

    // modify the page title according to the variable, if present
    if ($page_info['header']) {
        if(!isset($page_title))
            $page_title = 'Mod Share';
        $contents = str_replace('<$page_title/>', $page_title, $contents);
    }

    // output the page
    echo $contents;
} else {
    // if not found, echo a 404 page
    if ($permission_error) {
        header('HTTP/1.1 403 Forbidden');
        include SRV_ROOT . '/errorpages/permission_error.php';
    } else {
        header('HTTP/1.1 404 Not found');
        include SRV_ROOT . '/errorpages/404.php';
    }
}

$_SESSION['lastvisit'] = time();
$db->close();
 
 // Setup mysql connection

 
 $newawe = new Newawe($mysqli);
  $newawe>setPage(isset($_GET['p']) ? $_GET['p'] : "home");
  echo $newawe>render();

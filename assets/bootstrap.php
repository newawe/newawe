<?php
//Newawe - Bootstrap
//This file contains settings such as the database.

$db_info = array( //database info
    'host'    => '',
    'user'     => '',
    'pass'     => '',
    'name'    => ''
);

$modlist = array( //list of allowed mods
    'html' => array(
        'extension'    => 'html',
        'name'        => 'HTML'
    ),
    'php' => array(
        'extension'    => 'php',
        'name'        => 'PHP'
    ),
    'javascript' => array(
        'extension'    => 'js',
        'name'        => 'JavaScript'
    ),
    'xml' => array(
        'extension'    => 'xml',
        'name'        => 'XML'
    ),
    'other' => array(
        'extension'    => 'txt',
        'name'        => 'An unrecognized file'
    ),
    
);

$disallowed_dirs = array('cache', 'drivers', 'pages', 'errorpages', 'includes', 'sessions.sqlite');


$hash_salt = 'nw'; //a two-letter string representing the salt that will be used to hash passwords

define('MS_DEBUG', false); //enable debug mode (shows number of queries on the bottom of the page for admins and shows more detailed error information)
define('MS_EMERGENCY', false); //enables emergency mode
define('TOO_MANY_CONNECTIONS', 700); //more than this many connections in 10 minutes from one IP will cause a DDoS warning

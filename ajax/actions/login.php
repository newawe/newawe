<?php

session_start();

require __DIR__ . "/../../classes/helpers/hash.php";
require __DIR__ . "/../../classes/helpers/credentials.php";

$DbConf = require __DIR__ . "/../../configs/mysql.php";

// Setup mysql connection
$mysqli = new mysqli($DbConf['host'], $DbConf['user'], $DbConf['password'], $DbConf['database']);

if (isset($_POST['username']) && isset($_POST['password'])) {
    if (credentials::userExist($_POST['username'], $mysqli)) {
        if (credentials::checkPassword($_POST['username'],$_POST['password'],$mysqli)){
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['id'] = credentials::getIdFromUser($_POST['username'], $mysqli);
            $data = ['username'=>$_SESSION['username'], 'id'=> $_SESSION['id']];
        } else {
            $data = ["error" => ["code" => 4, "message" => "Username or password incorrect"]];
        }
    } else {
        $data = ["error" => ["code" => 4, "message" => "Username or password incorrect"]];
    }
} else {
    $data = ["error" => ["code" => 3, "message" => "Please fill out the form completely"]];
}

include "../index.php";
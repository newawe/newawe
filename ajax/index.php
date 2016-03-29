<?php
// Set content type to json
header('Content-Type: application/json');

$functions = ["countries"];

if (isset($_GET['a']) && in_array($_GET['a'],$functions))
    echo json_encode(include __DIR__."/actions/{$_GET['a']}.php");
else
    echo json_encode(["error"=>["code"=>1, "message"=>"Function not found"]]);
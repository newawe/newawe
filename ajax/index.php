<?php
//todo: implement a proper RESTfull api

// Set content type to json
header('Content-Type: application/json');

if (isset($data)) {
    echo json_encode($data);
} else {
    echo json_encode(["error"=>["code"=>1, "message"=>"Function not found"]]);
}

<?php

class user {
    private $id;
    private $mysqli = null;

    public function __construct($mysqli, $id)
    {
        if (!credentials::idExist($id, $mysqli)) {
            die("User does not exist"); // todo: implement proper error reporting to user
        }
        $this->mysqli = $mysqli;
        $this->id = $id;
    }
}

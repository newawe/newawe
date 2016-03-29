<?php

class user {
    private $id;
    private $mysqli = null;

    public function __construct($mysqli,$id)
    {
        $this->mysqli = $mysqli;
    }
}
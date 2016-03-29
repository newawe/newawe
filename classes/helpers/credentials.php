<?php

/**
 * Created by PhpStorm.
 * User: robin
 * Date: 3/29/16
 * Time: 11:25 PM
 */
class credentials
{
    public $mysqli;

    public function idExist($id,$mysql = null) {
        ($mysql===null) ?: $mysqli = $this->mysqli;
    }
}
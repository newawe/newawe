<?php

/**
 * Created by PhpStorm.
 * User: robin
 * Date: 3/29/16
 * Time: 11:16 PM
 */
class PasswordHash
{
    public static function hash($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function verify($password, $hash)
    {
        return password_verify($password, $hash);
    }

}
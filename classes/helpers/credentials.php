<?php

/**
 * Created by PhpStorm.
 * User: robin
 * Date: 3/29/16
 * Time: 11:25 PM
 */
class credentials
{
    /**
     * @param $id int Player id
     * @param $mysql mysqli
     * @return bool if player id exists
     */
    public static function idExist($id, $mysql)
    {
        /* create a prepared statement */
        $stmt = $mysql->stmt_init();
        if ($stmt->prepare("SELECT count(*) FROM nw_users WHERE row_id=? limit 1")) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $count = 0;
            $stmt->bind_result($count);
            $stmt->fetch();
            $stmt->close();
            return $count > 0;
        }
        return false;
    }

    /**
     * @param $username string Player username
     * @param $mysql    mysqli
     * @return bool if username exists
     */
    public static function userExist($username, $mysql)
    {
        /* create a prepared statement */
        $stmt = $mysql->stmt_init();
        if ($stmt->prepare("SELECT count(*) FROM nw_users WHERE username=? limit 1")) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $count = 0;
            $stmt->bind_result($count);
            $stmt->fetch();
            $stmt->close();
            return $count > 0;
        }
        return false;
    }

    /**
     * @param $id int|string user id or username
     * @param $password string password to verify
     * @param $mysql mysqli
     * @return bool if password is correct
     */
    public static function checkPassword($id, $password, $mysql)
    {
        $hash = self::getPasswordHash($id, $mysql);
        return PasswordHash::verify($password, $hash);
    }

    /**
     * @param $id int|string user id or username
     * @param $mysql
     * @return bool|string
     */
    public static function getPasswordHash($id, $mysql)
    {
        if (is_int($id)) {
            return self::getPasswordHashId($id, $mysql);
        }
        return self::getPasswordHashUser($id, $mysql);
    }

    /**
     * @param $id int user id
     * @param $mysql
     * @return bool|string
     */
    private static function getPasswordHashId($id, $mysql)
    {
        /* create a prepared statement */
        $stmt = $mysql->stmt_init();
        if ($stmt->prepare("SELECT password FROM nw_users WHERE row_id=? limit 1")) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $hash = null;
            $stmt->bind_result($hash);
            $stmt->fetch();
            $stmt->close();
            return $hash;
        }
        return false;
    }

    /**
     * @param $username string username
     * @param $mysql mysqli
     * @return bool|string
     */
    private static function getPasswordHashUser($username, $mysql)
    {
        /* create a prepared statement */
        $stmt = $mysql->stmt_init();
        if ($stmt->prepare("SELECT password FROM nw_users WHERE username=? limit 1")) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $hash = null;
            $stmt->bind_result($hash);
            $stmt->fetch();
            $stmt->close();
            return $hash;
        }
        return false;
    }

    /**
     * @param $username string Username
     * @param $mysql mysqli
     * @return bool|int
     */
    public static function getIdFromUser($username, $mysql)
    {
        /* create a prepared statement */
        $stmt = $mysql->stmt_init();
        if ($stmt->prepare("SELECT row_id FROM nw_users WHERE username=? limit 1")) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $id = null;
            $stmt->bind_result($id);
            $stmt->fetch();
            $stmt->close();
            return $id;
        }
        return false;
    }
}

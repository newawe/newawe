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

    public function idExist($id, $mysql = null)
    {
        ($mysql === null) ?: $mysql = $this->mysqli;
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

    public function userExist($username, $mysql = null)
    {
        ($mysql === null) ?: $mysql = $this->mysqli;
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

    public function getPasswordHash($id, $mysql = null)
    {
        ($mysql === null) ?: $mysql = $this->mysqli;
        if (is_int($id)){
            return $this->getPasswordHashId($id, $mysql);
        }
        return $this->getPasswordHashUser($id, $mysql);
    }

    private function getPasswordHashId($id, $mysql)
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

    private function getPasswordHashUser($username, $mysql)
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
}
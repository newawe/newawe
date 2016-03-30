<?php

/**
 * Created by PhpStorm.
 * User: robin
 * Date: 3/28/16
 * Time: 7:48 PM
 */
class Newawe
{
    private $page = "index";
    private $mysqli = null;

<<<<<<< HEAD

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
=======
    public function __construct()
    {
>>>>>>> master
    }

    public function setPage($page)
    {
        $this->page = $page;
    }

    public function getPage()
    {
        return $this->page;
    }

    public function render()
    {
        $view = new View($this->page, [
            "site-title" => "Newawe",
            "page-title" => ucfirst($this->page), // Capitalize page title
            "loggedin-text" => isset($_SESSION['username'])? "Welcome back {$_SESSION['username']}!" : "Not logged in"
        ]);

        return $view->render();
    }
}
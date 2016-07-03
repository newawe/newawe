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

    public $router;


    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
        $this->router = new router();
    }

    public function setPage($page)
    {
        $this->page = $page;
    }

    public function getPage()
    {
        return $this->page;
    }

    public function run()
    {
        $this->router->execute($this->page);
    }


}

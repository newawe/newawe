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

    public function __construct()
    {

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
        $view = new view($this->page, array(
            "site-title" => "Newawe"
        ));

        return $view->render();
    }


}

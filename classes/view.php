<?php

/**
 * Created by PhpStorm.
 * User: robin
 * Date: 3/28/16
 * Time: 7:49 PM
 */
class View
{
    private $page = "index";
    private $vars = [];

    public function __construct($page, $vars = [])
    {
        $this->page = str_replace([".","/","'",'"'],"",$page);

<<<<<<< HEAD
        if ($page == "global")
            $this->page = "home";

=======
        if($page == "global") {
            $this->page = "home";
        }
>>>>>>> master

        $this->vars = $vars;
    }

    public function render($template = "global")
    {
        if($template == "global") {
            $file = __DIR__."/../views/global.html";
        } else {
            $file = __DIR__ . "/../views/pages/$template.html";
        }

        $work = file_get_contents($file);

        foreach($this->vars as $var => $value) {
            $work = str_replace("{{ $var }}", $value, $work);
        }
        if($template == "global") {
            $work = str_replace("{{ content }}", $this->render($this->page), $work);
        }
        return $work;
    }
}
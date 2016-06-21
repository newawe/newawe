<?php

/**
 * Created by PhpStorm.
 * User: robin
 * Date: 3/28/16
 * Time: 7:49 PM
 */

class view
{
    private $page = "index";
    private $vars = [];

    public function __construct($page, $vars = [])
    {
        $this->page = str_replace([".","/","'",'"'],"",$page);

        if ($page == "global")
            $this->page = "home";


        $this->vars = $vars;
    }

    public function render($template = "global")
    {
         include "/../configs/pages.php";
        if ($template == "global") {
            $file = __DIR__."/../views/global.html";
        } else {
           if (in_array($template, $pages)) {
                $file = __DIR__ . "/../views/pages/$template.html";
            } else {
               $file = __DIR__ . "/../views/pages/404.html";
            }
        }


        $work = file_get_contents($file);

        foreach ($this->vars as $var => $value) {
            $work = str_replace("{{ $var }}", $value, $work);
        }
        if ($template == "global") {
            $work = str_replace("{{ content }}", $this->render($this->page), $work);
        }
        return $work;

    }
}

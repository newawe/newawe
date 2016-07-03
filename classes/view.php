<?php

/**
 * Created by PhpStorm.
 * User: robin
 * Date: 3/28/16
 * Time: 7:49 PM
 */

class view
{
    private $vars = [];

    public function __construct($vars = [])
    {
        $this->vars = $vars;
    }

    /**
     * @param array $vars
     */
    public function setVars($vars)
    {
        $this->vars = $vars;
    }

    public function render($template)
    {
        if ($template == "global") {
            $file = __DIR__."/../views/global.html";
        } else {
            $file = __DIR__ . "/../views/pages/$template.html";
        }


        $work = file_get_contents($file);

        foreach ($this->vars as $var => $value) {
            $work = str_replace("{{ $var }}", $value, $work);
        }
        if ($template != "global") {
            $work = str_replace("{{ content }}", $this->render("global"), $work);
        }
        return $work;

    }
}

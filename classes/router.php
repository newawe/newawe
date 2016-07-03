<?php
class router {
    private $routes = [];

    public function add($route, callable $cb) {
        $this->routes[$route] = $cb;
    }

    public function execute($path) {
        foreach ($this->routes as $route => $cb) {
             if (preg_match($route, $path, $matches, PREG_OFFSET_CAPTURE)!=FALSE) {
                 $cb(new view(),$matches);
             }
        }
    }
}

<?php

namespace Src;

class View
{
    private $route;
    private $path;
    private $params;

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }

    public function render($view, $vars = [])
    {
        $this->params = $vars;
        if (file_exists("../app/views/$view.php")) {
            require "../app/views/$view.php";
        } else {
            echo 'Cannot find view ' . $this->path;
        }
    }

    public function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }
}
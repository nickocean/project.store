<?php

namespace Src\View;

class View
{
    public $route;
    public $path;

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }

    public function render()
    {
        if (file_exists('public/' . $this->path . '.php')) {
            require 'public/' . $this->path . '.php';
        } else {
            echo 'Cannot find view' . $this->path;
        }
    }

    public function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }
}
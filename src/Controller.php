<?php

namespace Src;


class Controller
{
    public $route;
    public $view;
    public $model;

    function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
        $this->model = $this->loadModel($route['model']);
    }

    public function loadModel($name)
    {
        $path = ucfirst($name);
        if (class_exists($path)) {
            $model = new $path($this->route['db']);
            return $model;
        }
    }
}


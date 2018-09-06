<?php

namespace Src;


class Controller
{
    private $route;
    protected $view;
    protected $model;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
        $this->model = $this->loadModel($route['model']);
    }

    private function loadModel($name)
    {
        $path = ucfirst($name);
        if (class_exists($path)) {
            $model = new $path($this->route['db']);
            return $model;
        }
    }
}


<?php

namespace Src;



class Router
{
    public $routes = [];
    public $params = [];
    public function __construct()
    {
        $arr = require_once APP . '/routes/routes.php';
        foreach ($arr as $key => $value) {
            $this->add($key, $value);
        }
    }
    public function add($route, $params)
    {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }
    public function match()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }
    public function run()
    {
        if ($this->match()) {
                    $controllerName = $this->params['controller'];
                    $action = $this->params['action'];
                    $controller = new $controllerName($this->params);
                    $controller->$action();
        } else {
            echo "Cannot find route";
        }
    }
}
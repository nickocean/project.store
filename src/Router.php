<?php

namespace Src;



use Src\Session\Session;

class Router
{
    public $routes = [];
    public $params = [];
    public function __construct()
    {
        Session::start();
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
        $url = explode('?', $_SERVER['REQUEST_URI']);
        $url = trim($url[0], '/');
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
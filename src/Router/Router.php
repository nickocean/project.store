<?php

namespace Src\Router;


class Router
{
    public $routes = [];
    public $params = [];

    public function __construct()
    {
        $arr = require_once "/home/NIX/phpuser/project.store/app/routes/routes.php";

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
            $controllerFile = 'PagesController.php';
            $controllerPath = '/home/NIX/phpuser/project.store/app/controllers/' . $controllerFile;

            if (file_exists($controllerPath)) {
                require '/home/NIX/phpuser/project.store/app/controllers/'.$controllerFile;
            } else {
                echo "Cannot find controller";
            }

            $action = $this->params['action'];
            if (method_exists($controllerPath, $action)) {
                $controller = new $controllerPath($this->params);
                $controller->$action();
            } else {
                echo "Cannot find action: " . $action;
            }
        } else {
            echo "Cannot find route";
        }
    }
}

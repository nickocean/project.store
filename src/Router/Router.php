<?php

namespace Src\Router;

class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        $arr = require_once "../app/routes/routes.php";

        foreach ($arr as $key => $value) {
            $this->add($key, $value);
        }
    }

    public function add($route, $params)
    {
        $route = "#^" . $params . "$#";
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
            $path = "..\..\app\controllers\\" . ucfirst($this->params['controller']) . "Controller";

            if (class_exists($path)) {
                $action = $this->params['action'] . "Action";

                if (method_exists($path, $action)) {
                    $controller = new $path;
                    $controller->$action();
                } else {
                    echo "Cannot find action: " . $action;
                }
            } else {
                echo "Cannot find controller: " . $path;
            }
        } else {
            echo "Cannot find route";
        }
    }
}

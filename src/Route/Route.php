<?php

namespace Src\Route;

class Route
{
    public static function get()
    {
        $routes = require_once '../../app/routes/routes.php';

        if (!empty($routes[$_SERVER['REQUEST_URI']])) {
            $routes = explode('@', $routes[$_SERVER['REQUEST_URI']]);
            $contrName = $routes[0];
            $action = $routes[1];
            $controller = $contrName . '.php';
            require_once '../../app/controllers/' . $controller;

            $controller = new $controller();
            $controller()->$action();

        } else {
            echo '404';
        }

    }
}

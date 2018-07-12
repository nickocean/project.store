<?php

namespace Src\Controller;

use Src\View\View;

class Controller
{
    public $route;
    public $view;

    function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
    }

}


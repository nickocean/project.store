<?php

namespace Src\Controller;

use Src\View\View;

class Controller
{
    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View();
    }

    function index()
    {
    }

    public function basket()
    {
    }

    public function product()
    {
    }
}


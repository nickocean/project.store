<?php

namespace App\Controllers\PagesController;

use Src\Controller\Controller;

class PagesController extends Controller
{
    public function index()
    {
        $this->view->render();
    }

    public function basket()
    {
       $this->view->render();
    }

    public function product()
    {
        $this->view->render();
    }
}
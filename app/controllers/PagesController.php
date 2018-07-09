<?php

namespace App\Controllers;

use Src\Controller\Controller;
use Src\View\View;

class PagesController extends Controller
{
    public function index()
    {
        $this->view->getView('index.php');
    }

    public function basket()
    {
        $this->view->getView('basket.php');
    }

    public function product()
    {
        $this->view->getView('product.php');
    }
}
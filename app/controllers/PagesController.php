<?php

namespace App\Controllers;

use Src\Controller\Controller;
use Src\Route\Route;

class PagesController extends Controller
{
    public function index()
    {
        Route::get();
        $this->view->getView('index.php');
    }

    public function basket()
    {
        Route::get();
        $this->view->getView('basket.php');
    }

    public function product()
    {
        $this->view->getView('product.php');
    }
}
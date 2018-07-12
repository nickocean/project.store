<?php

namespace App\Controllers;

use Src\Controller\Controller;

class PagesController extends Controller
{
    public function indexAction()
    {
        $this->view->render('Main page');
    }

    public function basketAction()
    {
        $this->view->render('Basket');
    }

    public function productAction()
    {
        $this->view->render('Product name');
    }
}
<?php

namespace App\controllers;


use Src\Controller;

class ProductController extends Controller
{
    public function product()
    {
        $this->view->render('product');
    }
}
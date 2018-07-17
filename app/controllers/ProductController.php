<?php

namespace App\controllers;


use Src\Controller;

class ProductController extends Controller
{

    public function product()
    {
        $result = $this->model->getProduct($_GET['id']);
        $vars = [
            'content' => $result
        ];
        $this->view->render('product', $vars);
    }
}
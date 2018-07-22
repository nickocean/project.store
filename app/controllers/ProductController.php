<?php

namespace App\controllers;


use Src\Controller;

class ProductController extends Controller
{
    public function product()
    {
        $content = $this->model->getProduct($_GET['id']);
        $comments = $this->model->getComments($_GET['id']);
        $vars = [
            'content' => $content,
            'comments' => $comments
        ];
        $this->view->render('product', $vars);
    }

    public function comment()
    {
    	$this->model->addComment($_GET['id']);

    	$this->product();
    }
}
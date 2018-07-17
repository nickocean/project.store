<?php


namespace App\controllers;

use Src\Controller;

class MainController extends Controller
{
    public function index()
    {
        $result = $this->model->getData();
        $vars = [
            'content' => $result
        ];
        $this->view->render('main', $vars);
    }
}
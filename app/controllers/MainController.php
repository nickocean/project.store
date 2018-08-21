<?php


namespace App\controllers;

use Src\Controller;
use Src\Session\Session;

class MainController extends Controller
{
    public function index()
    {
        $result = $this->model->getData($_GET['page']);
        $vars = [
            'content' => $result
        ];
	    $this->view->render('main', $vars);
    }
}
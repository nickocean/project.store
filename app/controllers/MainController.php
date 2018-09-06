<?php


namespace App\controllers;

use Src\Controller;

class MainController extends Controller
{
	private $content;
	private $data;

    public function index()
    {
        $this->data = $this->model->getData($_GET['page']);
        $this->content = [
            'content' => $this->data
        ];
	    $this->view->render('main', $this->content);
    }
}
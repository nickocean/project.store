<?php


namespace App\controllers;


use Src\Controller;

class MainController extends Controller
{
    public function index()
    {
        $this->view->render('main');
    }
}
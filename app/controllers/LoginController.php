<?php

namespace App\controllers;

use Src\Controller;

class LoginController extends Controller
{

    public function form()
    {
        $this->view->render('login');
    }

    public function login()
    {
        $this->model->run();

        if (!isset($_SESSION['user'])) {
        	$this->view->render('login');
        }
    }

    public function logout()
    {
        $this->model->authOut();
    }

}
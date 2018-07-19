<?php

namespace App\controllers;

use Src\Controller;
use Src\Session\Session;

class LoginController extends Controller
{

    public function form()
    {
        $this->view->render('login');
    }

    public function login()
    {
        $this->model->run();
    }

    public function logout()
    {
        $this->model->authOut();
    }

}
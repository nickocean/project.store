<?php

namespace App\controllers;

use Src\Controller;

class RegistrationController extends Controller
{
	public function form()
	{
		$this->view->render('register');
	}

	public function register()
	{
		$this->model->run();
	}
}
<?php

namespace App\controllers;

use Src\Controller;

class BasketController extends Controller
{
    public function basket()
    {
        $data = $this->model->request($_GET['id']);
        $vars = [
            'content' => $data
        ];
        $this->view->render('basket', $vars);
    }

}
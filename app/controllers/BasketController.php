<?php

namespace App\controllers;

use Src\Controller;

class BasketController extends Controller
{
    public function basket()
    {
        $result = $this->model->getData();
        $vars = [
            'content' => $result
        ];
        $this->view->render('basket', $vars);
    }

}
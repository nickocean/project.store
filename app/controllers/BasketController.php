<?php

namespace App\controllers;

use Src\Controller;

class BasketController extends Controller
{
    public function basket()
    {
        $this->view->render('basket');
    }

}
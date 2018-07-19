<?php

namespace App\controllers;

use Src\Controller;

class BasketController extends Controller
{
    public function basket()
    {
        $this->model->add($_GET['id']);

        $this->view->render('basket');
    }

    public function delete()
    {
        $this->model->del($_GET['id']);

        $this->view->render('basket');
    }

}








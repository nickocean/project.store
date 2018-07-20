<?php

namespace App\controllers;

use Src\Controller;

class BasketController extends Controller
{
    public function basket()
    {
        if (isset($_GET['id'])) {
            $this->model->add($_GET['id']);
        }
        $this->view->render('basket');

    }

    public function delete()
    {
        $this->model->del($_GET['id']);

        $this->view->render('basket');
    }

    public function buy()
    {

        $this->model->addOrder();

        $this->view->render('basket');

    }

}








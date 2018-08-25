<?php

namespace App\controllers;

use Src\Controller;

class ProductController extends Controller
{
    public function product()
    {
    	$id = $_GET['id'];
        $content = $this->model->getProduct($id);
        $comments = $this->model->getComments($id);
        $vars = [
            'content' => $content,
            'comments' => $comments
        ];
        $this->view->render('product', $vars);
    }

    public function editView()
    {
    	$id = $_GET['id'];
    	$product['product'] = $this->model->getProduct($id);
    	$this->view->render('edit', $product);
    }

    public function edit()
    {
    	$id = $_GET['id'];
    	$this->model->editProduct($id);
    }

    public function addView()
    {
	    $this->view->render('add');
    }

    public function add()
    {
    	$this->model->addProduct();
    }

    public function delete()
    {
	    $id = $_GET['id'];
	    $this->model->deleteProduct($id);
    }

    public function addComment()
    {
    	$this->model->addComment($_GET['id']);
    	$this->product();
    }

	public function deleteComment()
	{
		$this->model->deleteComment($_GET['id']);
	}
}
<?php

namespace App\controllers;

use Src\Controller;

class ProductController extends Controller
{
	private $id;
	private $content;
	private $comments;
	private $data = [];

    public function product()
    {
    	$this->id = $_GET['id'];
        $this->content = $this->model->getProduct($this->id);
        $this->comments = $this->model->getComments($this->id);
        $this->data = [
            'content' => $this->content,
            'comments' => $this->comments
        ];
        $this->view->render('product', $this->data);
    }

    public function editView()
    {
    	$this->id = $_GET['id'];
    	$this->data['product'] = $this->model->getProduct($this->id);
    	$this->view->render('edit', $this->data);
    }

    public function edit()
    {
    	$this->id = $_GET['id'];
    	$this->model->editProduct($this->id);
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
	    $this->id = $_GET['id'];
	    $this->model->deleteProduct($this->id);
    }

    public function addComment()
    {
    	$this->id = $_GET['id'];
    	$this->model->addComment($this->id);
    	$this->product();
    }

	public function deleteComment()
	{
		$this->id = $_GET['id'];
		$this->model->deleteComment($this->id);
	}
}
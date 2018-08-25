<?php

namespace App\models;

use Src\Log;
use Src\Model;
use Src\Flashes;

class Product extends Model
{

    public function getProduct($id)
    {
        $result = $this->db->row("SELECT * FROM products WHERE id = $id");
        return $result;
    }

    public function editProduct($id)
    {
    	$name = $_POST['name'];
    	$description = $_POST['description'];
    	$price = $_POST['price'];
    	$image = $_POST['image'];
	    if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
	    	$this->db->query("UPDATE products SET name = '{$name}', description = '{$description}', price = {$price}, image = '{$image}' WHERE id = {$id}");
	    	Log::notice("Updated product: (id = $id)", $_SESSION['user']);
	    	header('Location: ../');
	    }
    }

    public function addProduct()
    {
	    $name = $_POST['name'];
	    $description = $_POST['description'];
	    $price = $_POST['price'];
	    $image = $_POST['image'];
	    if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
			$this->db->query("INSERT INTO products (name, description, price, image) VALUES ('{$name}', '{$description}', '{$price}', '{$image}')");
			Log::notice('Product added: ', $_SESSION['user']);
			header('Location: ../');
	    }
    }

    public function deleteProduct($id)
    {
    	$this->db->query("DELETE FROM products WHERE id = {$id}");
    	Log::notice("Product deleted (id = $id)", $_SESSION['user']);
    	header('Location: ../');
    }

    public function getComments($id)
    {
        $comments = $this->db->row("SELECT * FROM comments WHERE product_id = $id");
        foreach ($comments as $key => $comment) {
        	$comments[$key]['user_name'] = $this->db->row("SELECT name FROM users WHERE id = {$comment['user_id']}");
        } return $comments;
    }

    public function addComment($id)
    {
    	$userId = $_SESSION['user'][0]['id'];
    	$commentText = strip_tags($_POST['text']);
    	if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
		    $this->db->query("INSERT INTO comments (text, user_id, product_id) VALUES ('{$commentText}', {$userId}, {$id})");
		    Flashes::flash('success', 'Your comment was successfully added!');
		    Log::info("New comment: {$_POST['text']}", $_SESSION['user']);
	    }
    }

	public function deleteComment($id)
	{
		$this->db->query("DELETE FROM comments WHERE id = {$id}");
		Log::notice("Deleted comment with id = $id", $_SESSION['user']);
		header('Location: ../');
	}


}

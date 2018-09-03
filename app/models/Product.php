<?php

namespace App\models;

use Src\Log;
use Src\Model;
use Src\Flashes;

class Product extends Model
{

    public function getProduct($id)
    {
        $result = $this->db->select('products', 'id', $id);
        return $result;
    }

    public function editProduct($id)
    {
    	$name = $_POST['name'];
    	$description = $_POST['description'];
    	$price = $_POST['price'];
    	$image = $_POST['image'];
	    if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
	    	/*$cols = 'name,description,price,image';
	    	$values = " '{$name}'; '{$description}'; {$price}; '{$image}'";
	    	$this->db->update('products', $cols, $values, 'id', $id);*/
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
	    	$cols = 'name, description, price, image';
	    	$values = "'{$name}', '{$description}', '{$price}', '{$image}'";
			$this->db->insert('products', $cols, $values);
			Log::notice('Product added: ', $_SESSION['user']);
			header('Location: ../');
	    }
    }

    public function deleteProduct($id)
    {
    	$this->db->delete('products', 'id', $id);
    	Log::notice("Product deleted (id = $id)", $_SESSION['user']);
    	header('Location: ../');
    }

    public function getComments($id)
    {
        $comments = $this->db->select('comments', 'product_id', $id);
        foreach ($comments as $key => $comment) {
        	$comments[$key]['user_name'] = $this->db->select('users', 'id', $comment['user_id'], 'name');
        } return $comments;
    }

    public function addComment($id)
    {
    	$userId = $_SESSION['user'][0]['id'];
    	$commentText = strip_tags($_POST['text']);
    	if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    		$cols = 'text, user_id, product_id';
    		$values = "'{$commentText}', {$userId}, {$id}";
		    $this->db->insert('comments', $cols, $values);
		    Flashes::flash('success', 'Your comment was successfully added!');
		    Log::info("New comment: {$_POST['text']}", $_SESSION['user']);
	    }
    }

	public function deleteComment($id)
	{
		$this->db->delete('comments', 'id', $id);
		Log::notice("Deleted comment with id = $id", $_SESSION['user']);
		header('Location: ../');
	}


}
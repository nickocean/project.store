<?php

namespace App\models;

use Src\Log;
use Src\Model;
use Src\Flashes;

class Product extends Model
{
	private $id;
	private $name;
	private $description;
	private $price;
	private $image;
	private $product;
	private $comments;
	private $cols;
	private $values;
	private $userId;
	private $commentText;

    public function getProduct($id)
    {
    	$this->id = $id;
        $this->product = $this->db->select('products', 'id', $this->id);
        return $this->product;
    }

    public function editProduct($id)
    {
    	$this->id = $id;
    	$this->name = $_POST['name'];
    	$this->description = $_POST['description'];
    	$this->price = $_POST['price'];
    	$this->image = $_POST['image'];

	    if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
	    	/*$cols = 'name,description,price,image';
	    	$values = " '{$name}'; '{$description}'; {$price}; '{$image}'";
	    	$this->db->update('products', $cols, $values, 'id', $id);*/
	    	$this->db->query("UPDATE products SET name = '{$this->name}', description = '{$this->description}', price = {$this->price}, image = '{$this->image}' WHERE id = {$this->id}");
	    	Log::notice("Updated product: (id = $this->id)", $_SESSION['user']);
	    	header('Location: ../');
	    }
    }

    public function addProduct()
    {
	    $this->name = $_POST['name'];
	    $this->description = $_POST['description'];
	    $this->price = $_POST['price'];
	    $this->image = $_POST['image'];

	    if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
	    	$this->cols = 'name, description, price, image';
	    	$this->values = "'{$this->name}', '{$this->description}', '{$this->price}', '{$this->image}'";
			$this->db->insert('products', $this->cols, $this->values);
			Log::notice('Product added: ', $_SESSION['user']);
			header('Location: ../');
	    }
    }

    public function deleteProduct($id)
    {
    	$this->id = $id;
    	$this->db->delete('products', 'id', $this->id);
    	Log::notice("Product deleted (id = $this->id)", $_SESSION['user']);
    	header('Location: ../');
    }

    public function getComments($id)
    {
    	$this->id = $id;
        $this->comments = $this->db->select('comments', 'product_id', $this->id);
        foreach ($this->comments as $key => $comment) {
        	$this->comments[$key]['user_name'] = $this->db->select('users', 'id', $comment['user_id'], 'name');
        } return $this->comments;
    }

    public function addComment($id)
    {
    	$this->id = $id;
    	$this->userId = $_SESSION['user'][0]['id'];
    	$this->commentText = strip_tags($_POST['text']);
    	if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    		$this->cols = 'text, user_id, product_id';
    		$this->values = "'{$this->commentText}', {$this->userId}, {$this->id}";
		    $this->db->insert('comments', $this->cols, $this->values);
		    Flashes::flash('success', 'Your comment was successfully added!');
		    Log::info("New comment: {$_POST['text']}", $_SESSION['user']);
	    }
    }

	public function deleteComment($id)
	{
		$this->id = $id;
		$this->db->delete('comments', 'id', $this->id);
		Log::notice("Deleted comment with id = $this->id", $_SESSION['user']);
		header('Location: ../');
	}


}

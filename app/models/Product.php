<?php

namespace App\models;

use Src\Model;
use Src\Flashes;

class Product extends Model
{
    public $id;

    public function getProduct($id)
    {
        $result = $this->db->row("SELECT * FROM products WHERE id = $id");

        return $result;
    }

    public function getComments($id)
    {
        $comments = $this->db->row("SELECT * FROM comments WHERE product_id = $id");
        foreach ($comments as $key => $comment) {
        	$comments[$key]['user_name'] = $this->db->row("SELECT name FROM users WHERE id = {$comment['user_id']}");
        }

        return $comments;
    }

    public function addComment($id)
    {
    	$commentText = strip_tags($_POST['text']);

    	if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {

		    $this->db->query("INSERT INTO comments (text, user_id, product_id) VALUES ('{$commentText}', {$_SESSION['user'][0]['id']}, {$id})");

		    Flashes::flash('success', 'Your comment was successfully added!');
	    }

    }
}
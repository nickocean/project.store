<?php

namespace App\models;

use Src\Model;

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

        return $comments;
    }

    public function getUsers($id)
    {
        $comments = $this->db->row("SELECT * FROM comments WHERE product_id = $id");

        return $comments;
    }
}
<?php

namespace App\models;


use Src\Model;
use Src\Session\Session;

class Product extends Model
{
    public $id;

    public function getProduct($id)
    {
        $result = $this->db->row("SELECT * FROM products WHERE id = $id");

        return $result;
    }
}
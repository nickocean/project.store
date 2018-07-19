<?php

namespace App\models;

use Src\Model;
use Src\Session\Session;

class Basket extends Model
{
    public $id;

    public function request($id)
    {
        $products = $this->db->row("SELECT id, name, description, price FROM products WHERE id = $id");

        return $products;
    }

    /*public function addItems($data)
    {
        Session::start();
        Session::set('products', $data);

        header('Location: ../');
    }*/

}
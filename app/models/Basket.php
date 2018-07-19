<?php

namespace App\models;

use Src\Model;
use Src\Session\Session;

class Basket extends Model
{
    public $id;

    public function add($id)
    {
        $products = $this->db->row("SELECT id, name, description, price FROM products WHERE id = $id ");

        if ($products) {
            if (isset($_SESSION['products'])) {
                foreach ($products as $product) {
                    $_SESSION['products'][] = $product;
                }
            } else {
                Session::set('products', $products);
            }
            return $products;
        }
    }

    public function del($id)
    {
        
    }
}

//SELECT * FROM products
//INNER JOIN products_orders ON products.id = products_orders.product_id
//LEFT JOIN orders ON products_orders.order_id = orders.id;


/*if ($products) {
    if (isset($_SESSION['products'])) {
        foreach ($products as $product) {
            $_SESSION['products'][] = $product;
        }
    } else {
        Session::set('products', $products);
    }
    return $products;
}*/


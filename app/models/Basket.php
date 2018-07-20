<?php

namespace App\models;

use Src\Model;

class Basket extends Model
{
    public $id;

    public function add($id):void
    {
        $products = $this->db->row("SELECT id, name, description, price FROM products WHERE id = $id");

        if ($products) {
            $products[0]['count'] = 1;
            if (isset($_SESSION['products'])) {
                foreach ($_SESSION['products'] as $key => $product) {
                    if ($products[0]['id'] == $product['id']) {
                        $_SESSION['products'][$key]['count']++;
                        return;
                    }
                }
                $_SESSION['products'][] = $products[0];
            } else {
                $_SESSION['products'][] = $products[0];
            }
            return;
        }
    }

    public function addOrder()
    {

        $this->db->query("INSERT INTO orders (user_id) VALUES ({$_SESSION['user'][0]['id']})");

        $orderId = $this->db->row("SELECT id FROM orders WHERE user_id = {$_SESSION['user'][0]['id']}");

        foreach ($_SESSION['products'] as $products => $product) {
            $this->db->query("INSERT INTO products_orders (product_count, product_id, order_id) VALUES ({$product['count']},{$product['id']}, {$orderId[0]['id']})");
        }

        unset($_SESSION['products']);

    }

    public function del($id)
    {
        foreach ($_SESSION['products'] as $products => $product) {
            if ($id == $product['id']) {
                unset($_SESSION['products'][$products]);
            }
        }
    }
}



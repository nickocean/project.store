<?php

namespace App\models;

use Src\Log;
use Src\Model;
use Src\Flashes;

class Basket extends Model
{
    public $id;

    public function add($id):void
    {
        $products = $this->db->row("SELECT id, name, description, price FROM products WHERE id = $id");

        if (isset($products)) {
            $products[0]['count'] = 1;
            $products[0]['price_one'] = $products[0]['price'];
            $_SESSION['total_price'] += $products[0]['price'];
            if (isset($_SESSION['products'])) {
                foreach ($_SESSION['products'] as $key => $product) {
                    if ($products[0]['id'] == $product['id']) {
                        $_SESSION['products'][$key]['count']++;
                        $_SESSION['products'][$key]['price'] += $_SESSION['products'][$key]['price_one'];
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
    	if ($_SESSION['total_price'] > 0) {

		    $this->db->query("INSERT INTO orders (price, user_id) VALUES ({$_SESSION['total_price']},{$_SESSION['user'][0]['id']})");

		    $orderId = $this->db->row("SELECT id FROM orders ORDER BY id DESC LIMIT 1");

		    foreach ($_SESSION['products'] as $products => $product) {
			    $this->db->query("INSERT INTO products_orders (product_count, product_id, order_id) VALUES ({$product['count']},{$product['id']}, {$orderId[0]['id']})");
		    }

		    Log::info('New order: ', $_SESSION['user']);

		    unset($_SESSION['products']);
		    unset($_SESSION['total_price']);

		    Flashes::flash('success', 'Your order was successfully accepted!');

	    } else {
    		Flashes::flash('danger', 'You have no products in the basket!');
	    }

    }

    public function del($id)
    {
        foreach ($_SESSION['products'] as $products => $product) {
            if ($id == $product['id']) {
                if ($product['count'] > 1) {
                    $_SESSION['products'][$products]['count']--;
                    $_SESSION['products'][$products]['price'] -= $_SESSION['products'][$products]['price_one'];
                    $_SESSION['total_price'] -= $_SESSION['products'][$products]['price_one'];

                } else {
	                $_SESSION['total_price'] -= $_SESSION['products'][$products]['price_one'];
                    unset($_SESSION['products'][$products]);
                }
            }
        }
    }
}



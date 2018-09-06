<?php

namespace App\models;

use Src\Log;
use Src\Model;
use Src\Flashes;

class Basket extends Model
{
    private $id;
    private $products;
    private $values;
    private $orderId;
	private $cols = 'price, user_id';
    private $select = 'id, name, description, price';

    public function add($id):void
    {
    	$this->id = $id;
        $this->products = $this->db->select('products', 'id', $this->id, $this->select);
        if (isset($this->products)) {
            $this->products[0]['count'] = 1;
            $this->products[0]['price_one'] = $this->products[0]['price'];
            $_SESSION['total_price'] += $this->products[0]['price'];
            if (isset($_SESSION['products'])) {
                foreach ($_SESSION['products'] as $key => $product) {
                    if ($this->products[0]['id'] == $product['id']) {
                        $_SESSION['products'][$key]['count']++;
                        $_SESSION['products'][$key]['price'] += $_SESSION['products'][$key]['price_one'];
                        return;
                    }
                }
                $_SESSION['products'][] = $this->products[0];
            } else {
                $_SESSION['products'][] = $this->products[0];
            } return;
        }
    }

    public function addOrder()
    {
    	if ($_SESSION['total_price'] > 0) {
    		$this->values = "{$_SESSION['total_price']},{$_SESSION['user'][0]['id']}";
		    $this->db->insert('orders', $this->cols, $this->values);
		    $this->orderId = $this->db->selectOrder('orders', 'id', 'id');
		    foreach ($_SESSION['products'] as $products => $product) {
		    	$this->cols = 'product_count, product_id, order_id';
		    	$this->values = "{$product['count']},{$product['id']}, {$this->orderId[0]['id']}";
			    $this->db->insert('products_orders', $this->cols, $this->values);
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
	    $this->id = $id;
        foreach ($_SESSION['products'] as $products => $product) {
            if ($this->id == $product['id']) {
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



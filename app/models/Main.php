<?php

namespace App\models;

use Src\Model;

class Main extends Model
{
	private $page;
	private $min = 0;
	private $max = 3;
	private $products = [];

    public function getData($page)
    {
    	$this->page = $page;

    	switch ($this->page) {
		    case 1:
		    	$this->min = 0;
		    	break;
		    case 2:
			    $this->min = 3;
		    	break;
		    case 3:
			    $this->min = 6;
			    break;
		    case 4:
			    $this->min = 9;
			    break;
		    case 5:
			    $this->min = 12;
			    break;
	    }

	    $this->products = $this->db->selectLimit('products', $this->min, $this->max);
	    return $this->products;
    }
}
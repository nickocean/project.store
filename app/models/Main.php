<?php

namespace App\models;

use Src\Model;

class Main extends Model
{

    public function getData($page)
    {
    	$min = 0;
    	$max = 3;

    	switch ($page) {
		    case 1:
		    	$min = 0;
		    	break;
		    case 2:
		    	$min = 3;
		    	break;
		    case 3:
			    $min = 6;
			    break;
		    case 4:
			    $min = 9;
			    break;
		    case 5:
			    $min = 12;
			    break;
	    }

	    $result = $this->db->query("SELECT * FROM products LIMIT {$min}, {$max}");
	    return $result;
    }
}
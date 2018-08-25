<?php

namespace App\models;

use Src\Model;

class Main extends Model
{

    public function getData($page)
    {
    	$min = 0;
    	$max = 4;

    	switch ($page) {
		    case 1:
		    	$min = 0;
		    	$max = 4;
		    	break;
		    case 2:
		    	$min = 3;
		    	$max = 7;
		    	break;
		    case 3:
			    $min = 6;
			    $max = 10;
			    break;
		    case 4:
			    $min = 9;
			    $max = 13;
			    break;
		    case 5:
			    $min = 12;
			    $max = 16;
			    break;
	    }

	    $result = $this->db->query("SELECT * FROM products WHERE id > '{$min}' AND id < '{$max}';");
	    return $result;
    }
}
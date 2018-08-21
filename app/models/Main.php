<?php

namespace App\models;

use Src\Model;

class Main extends Model
{

    public function getData($page)
    {
    	if (!isset($page) || $page == 1) {
		    $result = $this->db->query("SELECT * FROM products WHERE id < 4;");
	    } elseif ($page == 2) {
		    $result = $this->db->query("SELECT * FROM products WHERE id > 3 AND id < 7;");
	    } elseif ($page == 3) {
		    $result = $this->db->query("SELECT * FROM products WHERE id > 6 AND id < 10;");
	    } elseif ($page == 4) {
		    $result = $this->db->query("SELECT * FROM products WHERE id > 9 AND id < 13;");
	    }
	    return $result;
    }
}
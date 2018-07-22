<?php

namespace App\models;

use Src\Model;

class Main extends Model
{

    public function getData()
    {
        $result = $this->db->row("SELECT * FROM products;");
        return $result;
    }
}
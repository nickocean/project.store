<?php

namespace Src;

use Src\Db;

class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = new Db;
    }
}
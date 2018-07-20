<?php

namespace Src;

class Model
{
    public $db;

    public function __construct()
    {
        $this->db = new Db;
    }
}
<?php

namespace Src;

class Model
{
    protected $db;

    public function __construct()
    {
    	if (!isset($this->db)) {
		    $this->db = new Db;
	    } else {
    		return null;
	    }
    }
}
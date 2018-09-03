<?php

namespace Src;

class Model
{
    protected $db;

    public function __construct($className)
    {
    	if (!isset($this->db)) {
		    $this->db = new $className;
	    } else {
    		return null;
	    }
    }
}
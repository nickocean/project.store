<?php

namespace App\models;

use Src\Model;
use Src\Session\Session;

class Login extends Model
{

    public function run()
    {
    	$arrHash = $this->db->row("SELECT password FROM users WHERE email = '{$_POST['email']}'");
    	$hash = $arrHash[0]['password'];
    	$pass = $_POST['password'];

    	if (password_verify($pass, $hash)) {
		    $stmt = $this->db->row("SELECT id, name, email FROM users WHERE name = '{$_POST['name']}' AND email = '{$_POST['email']}'");
	    }

        if ($stmt) {
            $this->auth($stmt);
        } else {
        	header('Location: form');
        }
    }

    public function auth($data)
    {
        Session::start();
        Session::set('user', $data);

        header('Location: ../');
    }

    public function authOut()
    {
        Session::destroy();

        header('Location: ../');
    }

}
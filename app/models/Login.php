<?php

namespace App\models;

use Src\Model;
use Src\Session\Session;

class Login extends Model
{

    public function run()
    {
        $stmt = $this->db->row("SELECT id, name, email, password FROM users WHERE name = '{$_POST['name']}' AND email = '{$_POST['email']}' AND password = '{$_POST['password']}'");
        if ($stmt) {
            $this->auth($stmt);
        } else {
            echo 'no';
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
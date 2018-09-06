<?php

namespace App\models;

use Src\Flashes;
use Src\Log;
use Src\Model;
use Src\Session;

class Login extends Model
{
	private $name;
	private $password;
	private $arrHash;
	private $hash;
	private $data;
	private $select = 'id, name, email';

    public function run()
    {
    	$this->name = "'" . $_POST['name'] . "'";
    	$this->arrHash = $this->db->select('users', 'name', $this->name, 'password');
    	$this->hash = $this->arrHash[0]['password'];
    	$this->password = $_POST['password'];
			if (password_verify($this->password, $this->hash) && isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
				$this->data = $this->db->select('users', 'name', $this->name, $this->select);
				$this->auth($this->data);
			} else {
				Flashes::flash('danger', 'Wrong name or password! Please, try again');
			}
    }

    private function auth($data)
    {
    	$this->data = $data;
        Session::set('user', $this->data);
        Log::info('Logged in user: ', $this->data);
        header('Location: ../');
    }

    public function authOut()
    {
        Session::destroy();
        header('Location: ../');
    }

}
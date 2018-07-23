<?php

namespace App\models;

use Src\Model;

class Registration extends Model
{
	public function run()
	{
		$email = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i';
		$username = '/^[a-z\d_]{5,20}$/i';

		if ($_POST['password'] == $_POST['confirm'] && preg_match($username, trim($_POST['name'])) && preg_match($email, trim($_POST['email']))) {

			$this->db->query("INSERT INTO users (name, email, password) VALUES ('{$_POST['name']}', '{$_POST['email']}', '{$_POST['password']}')");

			header('Location: ../');

		} else {
			header('Location: register');
		}

	}
}
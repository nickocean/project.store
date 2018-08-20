<?php

namespace App\models;

use Src\Model;
use Src\Flashes;
use Src\Session\Session;
use Src\Log;

class Registration extends Model
{
	public function run()
	{
		$email = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i';
		$username = '/^[a-z\d_]{5,20}$/i';
		$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

		if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {

			if ($_POST['password'] == $_POST['confirm'] && preg_match($username, trim($_POST['name'])) && preg_match($email, trim($_POST['email']))) {

				$this->db->query("INSERT INTO users (name, email, password) VALUES ('{$_POST['name']}', '{$_POST['email']}', '{$pass}')");
				$stmt = $this->db->row("SELECT id, name, email FROM users WHERE name = '{$_POST['name']}'");
				$this->auth($stmt);
			} else {
				Flashes::flash('danger', 'Wrong name or password! Please, try again');
			}
		}
	}

	public function auth($data)
	{
		Session::set('user', $data);
		Log::info('New user: ', $data);
		header('Location: ../');
	}
}
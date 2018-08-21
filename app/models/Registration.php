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
		$nameExist = $this->db->row("SELECT name FROM users WHERE name = '{$_POST['name']}'");
		$emailExist = $this->db->row("SELECT email FROM users WHERE email = '{$_POST['email']}'");

		if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token'] && !isset($nameExist[0]) && !isset($emailExist[0])) {

			if ($_POST['password'] == $_POST['confirm'] && preg_match($username, trim($_POST['name'])) && preg_match($email, trim($_POST['email']))) {
				$this->db->query("INSERT INTO users (name, email, password) VALUES ('{$_POST['name']}', '{$_POST['email']}', '{$pass}')");
				$stmt = $this->db->row("SELECT id, name, email FROM users WHERE name = '{$_POST['name']}'");
				$this->auth($stmt);
			} elseif (!preg_match($username, trim($_POST['name']))) {
				Flashes::flash('danger', 'Name should contain more than 5 and less than 20 words!');
			} elseif (!preg_match($email, trim($_POST['email']))) {
				Flashes::flash('danger', 'Invalid email!');
			} elseif ($_POST['password'] != $_POST['confirm']) {
				Flashes::flash('danger', 'Passwords do not match!');
			}
		}
		if (isset($emailExist[0])) {
			Flashes::flash('danger', 'This email already exists!');
		}
		if (isset($nameExist[0])) {
			Flashes::flash('danger', 'This name already exists!');
		}
	}

	public function auth($data)
	{
		Session::set('user', $data);
		Log::info('New user: ', $data);
		header('Location: ../');
	}
}
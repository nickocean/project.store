<?php

namespace App\models;

use Src\Model;
use Src\Flashes;
use Src\Session;
use Src\Log;

class Registration extends Model
{
	private $name;
	private $email;
	private $password;
	private $nameExist;
	private $emailExist;
	private $data;
	private $values;
	private $cols = 'name, email, password';
	private $select = 'id, name, email';
	private $validEmail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i';
	private $validName = '/^[a-z\d_]{5,20}$/i';

	public function run()
	{
		$this->name = "'" . $_POST['name'] . "'";
		$this->email = "'" . $_POST['email'] . "'";
		$this->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$this->nameExist = $this->db->select('users', 'name', $this->name, 'name');
		$this->emailExist = $this->db->select('users', 'email', $this->email, 'email');

		if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token'] && !isset($this->nameExist[0]) && !isset($this->emailExist[0])) {
			if ($_POST['password'] == $_POST['confirm'] && preg_match($this->validName, trim($_POST['name'])) && preg_match($this->validEmail, trim($_POST['email']))) {
				$this->values = "'{$_POST['name']}', '{$_POST['email']}', '{$this->password}'";
				$this->db->insert('users', $this->cols, $this->values);
				$this->data = $this->db->select('users', 'name', $this->name, $this->select);
				$this->auth($this->data);
			} elseif (!preg_match($this->validName, trim($_POST['name']))) {
				Flashes::flash('danger', 'Name should contain more than 5 and less than 20 words!');
			} elseif (!preg_match($this->validEmail, trim($_POST['email']))) {
				Flashes::flash('danger', 'Invalid email!');
			} elseif ($_POST['password'] != $_POST['confirm']) {
				Flashes::flash('danger', 'Passwords do not match!');
			}
		} if (isset($this->emailExist[0])) {
			Flashes::flash('danger', 'This email already exists!');
		} if (isset($this->nameExist[0])) {
			Flashes::flash('danger', 'This name already exists!');
		}
	}

	private function auth($data)
	{
		$this->data = $data;
		Session::set('user', $this->data);
		Log::info('New user: ', $this->data);
		header('Location: ../');
	}
}
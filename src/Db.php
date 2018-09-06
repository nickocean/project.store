<?php

namespace Src;

use PDO;

class Db
{
    private $db;

    public function __construct()
    {
        $config = require_once APP . '/config/db.php';
        if (!isset($this->db)) {
	        $this->db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['name'] . ';charset=utf8', $config['user'], $config['password']);
	        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } else {
        	return null;
        }
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    private function row($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

	public function select($table, $col, $colValue, $select = '*')
	{
		$result = $this->row("SELECT {$select} FROM {$table} WHERE {$col} = {$colValue}");
		return $result;
	}

	public function selectAll($table)
	{
		$result = $this->row("SELECT * FROM {$table}");
		return $result;
	}

	public function selectLimit($table, $min, $max, $select = '*')
	{
		$result = $this->row("SELECT {$select} FROM {$table} LIMIT {$min}, {$max}");
		return $result;
	}

	public function selectOrder($table, $order, $select = '*', $limit = 1)
	{
		$result = $this->row("SELECT {$select} FROM {$table} ORDER BY {$order} DESC LIMIT {$limit}");
		return $result;
	}

	public function insert($table, $cols, $values)
	{
		$this->query("INSERT INTO {$table} ({$cols}) VALUES ($values)");
	}

	/*public function update($table, $cols, $values, $where, $value)
	{
		$arr = explode(',', $cols);
		$array = explode(';', $values);
		$res = array_combine($arr, $array);
		$str = '';
		foreach ($res as $key => $value) {
			$str .= $key . ' =' . $value . ', ';
		}
		$result = substr($str, 0, -2);
		$this->query("UPDATE {$table} SET {$result} WHERE {$where} = {$value}");
	}*/

	public function delete($table, $col, $value)
	{
		$this->query("DELETE FROM {$table} WHERE {$col} = {$value}");
	}
}
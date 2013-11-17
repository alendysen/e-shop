<?php

namespace Core;

class Model extends DBAdapter
{
	public function __construct()
	{
		$this->db_host = \Config\Application::database()['host'];
		$this->db_user = \Config\Application::database()['username'];
		$this->db_pass = \Config\Application::database()['password'];
		$this->db_name = \Config\Application::database()['database'];

		$this->connect();
		$split_namespace = explode('\\', get_class($this));
		$_table = strtolower(end($split_namespace));
		$this->table = $_table;
		if(!$this->tableExists($this->table)){
			throw new MyException("table " . $this->table . " not found");
		}
	}
}

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

		$this->table = strtolower(Common::getClass($this));
		if(!$this->tableExists($this->table)){
			throw new MyException("table " . $this->table . " not found");
		}
	}
}

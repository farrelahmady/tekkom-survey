<?php

class Admin_model
{
	private $table = 'result';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllResult()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}
}

<?php

class Database extends PDO
{
	private static $instance = null;
	private $db_host = null;
	private $db_name = null;
	private $db_user = null;
	private $db_pass = null;

	public function __construct()
	{
		$this->db_host = Config::get()->database->host;
		$this->db_name = Config::get()->database->name;
		$this->db_user = Config::get()->database->user;
		$this->db_pass = Config::get()->database->pass;

		$connect_host = 'mysql:host=' . $this->db_host;
        $connect_host .= ';dbname=' . $this->db_name;
        $connect_host .= ';charset=utf8';

        parent::__construct($connect_host, $this->db_user, $this->db_pass);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	public static function get()
	{
		if (empty(self::$instance))
		{
			self::$instance = new Database();
		}
		return self::$instance;
	}
}
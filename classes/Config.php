<?php

class Config
{
	// TODO: Implement caching here!
	const DOCUMENT_ROOT_OVERRIDE = '/home/www/cookiejar/';
	private static $config = null;

	public static function get()
	{
		if (!empty(Config::$config))
		{
			return Config::$config;
		}
		Config::build_config();
		return Config::$config;
	}
	private static function build_config()
	{
		$root = $_SERVER['DOCUMENT_ROOT'];
		if (!empty(Config::DOCUMENT_ROOT_OVERRIDE))
		{
			$root = Config::DOCUMENT_ROOT_OVERRIDE;
		}
		$path = $root . 'config.json';
		$file = file_get_contents($path);
		$json = json_decode($file);
		Config::$config = $json[0];
	}
	public static function getSiteConfig($key)
	{
		$SITE = array(
			'NAME' => 'Cookie Jar'
			);
		return $SITE[$key];
	}
	public static function getDatabaseConfig($key)
	{
		$DATABASE = array(
			'HOST' => 'localhost',
			'NAME' => 'test_db',
			'USER' => 'test_db_user',
			'PASS' => 'dbpass123'
			);
		return $DATABASE[$key];
	}
	public static function getAuthConfig($key)
	{
		$AUTH = array(
			'ENCRYPT_COST' => 8
			);
		return $AUTH[$key];
	}
	public static function getUserConfig($key)
	{
		$USER = array(
			'USERNAME_MAX_LENGTH' => 16
			);
		return $USER[$key];
	}
}
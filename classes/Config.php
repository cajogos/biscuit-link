<?php

class Config
{
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
}
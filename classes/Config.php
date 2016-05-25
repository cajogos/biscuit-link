<?php

class Config
{
	public static function getSiteConfig($key)
	{
		$SITE = array(
			'NAME' => 'Site Name'
			);
		return $SITE[$key];
	}
	public static function getDatabaseConfig($key)
	{
		$DATABASE = array(
			'HOST' => 'localhost',
			'NAME' => '',
			'USER' => '',
			'PASS' => ''
			);
		return $DATABASE[$key];
	}
}
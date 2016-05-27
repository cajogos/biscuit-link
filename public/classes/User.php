<?php

class User
{
	private $id;
	private $auth_level = Auth::AUTH_VISITOR;
	private $username;
	private $email;

	public static function login($username, $password)
	{
		$test_user = 'carlos';
		$test_pass = 'trypass';
		$test_hash = '$2y$08$LCaHQTZwb1wAARdEFCL.a.fsJNbra3Pm2LdTsFVMIzMYmVx/D4D8m';

		if (Auth::pass_verify($password, $test_hash))
		{
			return true;
		}
		return false;
	}

	public static function register($username, $password, $email)
	{

	}
}

/* 

DATABASE NOTES:
- Password hash should be put in a 255 varchar field.

database fields: id, username, passwordhash, email, auth_level, register_date, date_modified

*/
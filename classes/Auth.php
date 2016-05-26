<?php

class Auth
{
	/** Authorisation Constants **/
	const AUTH_VISITOR = 0;
	const AUTH_USER = 1;
	const AUTH_MOD = 2;
	const AUTH_ADMIN = 3;

	private static $logged_in = null;
	private static $user_level = 0;

	public static function isLoggedIn()
	{
		if (empty(Auth::$logged_in))
		{
			// TODO Logic to check if logged in or not
			// Check session variable + others
		}
		return Auth::$logged_in;
	}

	public static function pass_hash($password)
	{
		$hash_options = array(
			'cost' => Config::getAuthConfig('ENCRYPT_COST')
			);
		return password_hash($password, PASSWORD_DEFAULT, $hash_options);
	}
	public static function pass_verify($try, $hash)
	{
		return password_verify($try, $hash);
	}
}
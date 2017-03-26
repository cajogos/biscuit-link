<?php

class Auth
{
	const AUTH_VISITOR = 0;
	const AUTH_USER = 1;
	const AUTH_MOD = 2;
	const AUTH_ADMIN = 3;

	private static $logged_in = null;
	private static $user_level = 0;

	public static function authUser($username)
	{
		session_regenerate_id();
		Session::setValue('userloggedin', $username);
	}
	public static function isLoggedIn()
	{
		if (empty(Auth::$logged_in))
		{
			Auth::$logged_in = false;
			if (!empty(Session::getValue('userloggedin')))
			{
				Auth::$logged_in = true;
				// TODO: Improve this
			}
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
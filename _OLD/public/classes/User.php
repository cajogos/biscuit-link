<?php

class User
{
	const DATABASE_TABLE = 'cookiejar_users';
	private $id;
	private $auth_level = Auth::AUTH_VISITOR;
	private $username;
	private $email;

	public static function login($username, $password)
	{
		// Check user exists
		if (!self::userExists($username))
		{
			throw new Exception('User does not exist');
		}
		if (!self::check_password($username, $password))
		{
			throw new Exception('Password is not correct');
		}
		return true;
	}
	public static function userExists($username)
	{
		$db = Database::get();
		$sql = 'SELECT COUNT(*) AS userExists FROM ' . self::DATABASE_TABLE . ' WHERE user_username=?';
		$st = $db->prepare($sql);
		if (!$st->execute(array($username)))
		{
			return false;
		}
		$res = $st->fetch(PDO::FETCH_ASSOC);
		return (bool) $res['userExists'];
	}
	private static function check_password($username, $password)
	{
		$db = Database::get();
		$sql = 'SELECT user_password FROM ' . self::DATABASE_TABLE . ' WHERE user_username=?';
		$st = $db->prepare($sql);
		if (!$st->execute(array($username)))
		{
			return false;
		}
		$res = $st->fetch(PDO::FETCH_ASSOC);
		$db_hash = $res['user_password'];
		return Auth::pass_verify($password, $db_hash);
	}
	public static function register($username, $password, $email)
	{
		$usernameOK = $passwordOK = $emailOK = false;
		// Validate the username
		$username = self::clean_username($username);
		$usernameOK = self::validate_username($username);
		// Validate the password
		$passwordOK = self::validate_password($password);
		// Validate the email
		$email = self::clean_email($email);
		$emailOK = self::validate_email($email);
		if ($usernameOK && $passwordOK && $emailOK)
		{
			// Valid registration
			$db = Database::get();
			$sql = 'INSERT INTO ' . self::DATABASE_TABLE . ' (user_username, user_password, user_email, user_registered) VALUES(?, ?, ?, NOW())';
			$st = $db->prepare($sql);
			$params = array();
			$params[] = $username;
			// Hash password to store
			$params[] = Auth::pass_hash($password);
			$params[] = $email;
			return $st->execute($params);
		}
		return false;
	}
	/* Username validation */
	private static function clean_username($username)
	{
		$username = trim($username);
		return $username;
	}
	private static function validate_username($username)
	{
		// Check username length from config
		$max_len = Config::get()->user->username_max_length;
		$min_len = Config::get()->user->username_min_length;
		if (!Validate::strLength($username, $max_len, $min_len))
		{
			throw new Exception('Username needs to be at least ' . $min_len . ' and greater than ' . $max_len . '.');
		}
		// Check username is alphanumeric only (can be set to false in the config.json file)
		if (Config::get()->user->alphanumeric_only)
		{
			if (!Validate::strAlphaNum($username))
			{
				throw new Exception('Usernames must be alphanumerical. No symbols allowed.');
			}
		}
		return true;
	}
	/* Password validation */
	private static function validate_password($password)
	{
		// Check password is within limits
		$max_len = Config::get()->pass->password_max_length;
		$min_len = Config::get()->pass->password_min_length;
		if (!Validate::strLength($password, $max_len, $min_len))
		{
			throw new Exception('Passwords must be at least ' . $min_len . ' characters long!');
		}
		// Password must contain a letter (lowercase or uppercase)
		if (Config::get()->pass->containsLetter)
		{
			if (!Validate::strContainsLetter($password))
			{
				throw new Exception('Passwords must contain at least one letter.');
			}
		}
		// Password must contain a digit
		if (Config::get()->pass->containsDigit)
		{
			if (!Validate::strContainsDigit($password))
			{
				throw new Exception('Passwords must contain at least one digit.');
			}
		}
		// Password must contain at least a special character
		if (Config::get()->pass->containsSpecialChar)
		{
			if (!Validate::strContainsSpecialChar($password))
			{
				throw new Exception('Passwords must contain at least one special character.');
			}
		}
		return true;
	}
	/* Email validation */
	private static function clean_email($email)
	{
		return trim($email);
	}
	private static function validate_email($email)
	{
		if (!Validate::email($email))
		{
			throw new Exception('The email is not valid');
		}
		return true;
	}
}
<?php

class Request
{
	/*** POST VARIABLES ***/

	/**
	 * @param string $key
	 * @return mixed|null
	 */
	public static function getPostVariable($key)
	{
		if (isset($_POST[$key]))
		{
			return $_POST[$key];
		}
		return null;
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 */
	public static function setPostVariable($key, $value)
	{
		$_POST[$key] = $value;
	}

	/*** GET VARIABLES ***/

	/**
	 * @param string $key
	 * @return mixed|null
	 */
	public static function getGetVariable($key)
	{
		if (isset($_GET[$key]))
		{
			return $_GET[$key];
		}
		return null;
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 */
	public static function setGetVariable($key, $value)
	{
		$_GET[$key] = $value;
	}

	/*** SESSION VARIABLES ***/

	/**
	 * @param string $key
	 * @return mixed|null
	 */
	public static function getSessionVariable($key)
	{
		if (isset($_SESSION[$key]))
		{
			return $_SESSION[$key];
		}
		return null;
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 */
	public static function setSessionVariable($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	/*** COOKIES (nom nom) ***/

	/**
	 * @param string $key
	 * @return mixed|null
	 */
	public static function getCookieVariable($key)
	{
		if (isset($_COOKIE[$key]))
		{
			return $_COOKIE[$key];
		}
		return null;
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @param integer $expiry
	 * @return bool
	 */
	public static function setCookieVariable($key, $value, $expiry = 0, $path = '', $domain = '', $secure = false, $httponly = false)
	{
		$expiry = time() . $expiry;
		return setcookie($key, $value, $expiry, $path, $domain, $secure, $httponly);
	}

	/**
	 * @param string $key
	 * @return bool
	 */
	public static function deleteCookieVariable($key)
	{
		return setcookie($key, '', (time() - 1000));
	}

	/*** HEADER FUNCTIONS ***/

	/**
	 * @param string $location
	 * @param bool $permanent_redirect
	 */
	public static function redirect($location, $permanent_redirect = false)
	{
		if ($permanent_redirect === true)
		{
			header('HTTP/1.1 301 Moved Permanently');
		}
		header('Location: ' . $location);
		exit;
	}
}
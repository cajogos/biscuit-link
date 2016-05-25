<?php

class Request
{
	/* **** */
	/* POST */
	/* **** */

	public static function hasPost()
	{
		return (bool) $_POST;
	}
	public static function getPostValue($key)
	{
		if (isset($_POST[$key]))
		{
			return $_POST[$key];
		}
		return null;
	}
	public static function setPostValue($key, $value)
	{
		$_POST[$key] = $value;
	}
	public static function _POST($key, $value = null)
	{
		if (empty($value))
		{
			return Request::getPostValue($key);
		}
		Request::setPostValue($key, $value);
	}

	/* *** */
	/* GET */
	/* *** */

	public static function hasGet()
	{
		return (bool) $_GET;
	}
	public static function getGetValue($key)
	{
		if (isset($_GET[$key]))
		{
			return $_GET[$key];
		}
		return null;
	}
	public static function setGetValue($key, $value)
	{
		$_GET[$key] = $value;
	}
	public static function _GET($key, $value = null)
	{
		if (empty($value))
		{
			return Request::getGetValue($key);
		}
		Request::setGetValue($key, $value);
	}

	/* ******* */
	/* COOKIES */
	/* ******* */

	public static function getCookieValue($key)
	{
		if (isset($_COOKIE[$key]))
		{
			return $_COOKIE[$key];
		}
		return null;
	}
	public static function setCookieValue($key, $value, $expiry = 60,
		$path = '', $domain = '', $secure = false, $httponly = false)
	{
		$expiry_date = time() + $expiry;
		setcookie($key, $value, $expiry_date, $path, $domain, $secure, $httponly);
	}
	public static function removeCookie($key)
	{
		$expiry_date = time() - 9000;
		setcookie($key, '', $expiry_date);
	}
}
<?php

class Session
{
	public static function setValue($key, $value)
	{
		$_SESSION[$key] = $value;
	}
	public static function getValue($key)
	{
		if (isset($_SESSION[$key]))
		{
			return $_SESSION[$key];
		}
		return null;
	}
	public static function destroy()
	{
		// Remove all session variables
		session_unset();
		// Destroy the current session
		session_destroy();
	}
}
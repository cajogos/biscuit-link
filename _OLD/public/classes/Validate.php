<?php

class Validate
{
	/**
	 * TODO:
	 * - Email validation
	 * - URL validation
	 */
	public static function strLength($string, $max_length, $min_length = 0)
	{
		$valid = false;
		if (self::strMaxLength($string, $max_length))
		{
			if (self::strMinLength($string, $min_length))
			{
				$valid = true;
			}
		}
		return $valid;
	}
	public static function strMaxLength($string, $max_length)
	{
		if (strlen($string) > $max_length)
		{
			return false;
		}
		return true;
	}
	public static function strMinLength($string, $min_length)
	{
		if (strlen($string) < $min_length)
		{
			return false;
		}
		return true;
	}
	// Check that string is alphanumerical only (letters and digits)
	public static function strAlphaNum($string)
	{
		return ctype_alnum($string);
	}
	// Check that string contains at least one letter
	public static function strContainsLetter($string)
	{
		return preg_match('/[a-zA-Z]/', $string);
	}
	// Check that string contains at least one digit
	public static function strContainsDigit($string)
	{
		return preg_match('/\d/', $string);
	}
	// Check that string contains at least one special character
	public static function strContainsSpecialChar($string)
	{
		return preg_match('/[^a-zA-Z\d]/', $string);
	}

	public static function email($email)
	{
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}
}
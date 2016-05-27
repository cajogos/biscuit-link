<?php

class Validate
{
	/**
	 * TODO:
	 * - Email validation
	 * - Alphanumerical check
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
}
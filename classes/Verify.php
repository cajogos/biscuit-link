<?php

class Verify
{
	public static function strLength($string, $max_length, $min_length = 0)
	{
		$valid = false;
		if (Verify::strMaxLength($string, $max_length))
		{
			if (Verify::strMinLength($string, $min_length))
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
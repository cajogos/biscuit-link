<?php

class User
{
	private $user_level;
	private $username;
	private $email;

	public static function passwordTest()
	{
		$try = 'password123456';
		$try_2 = 'password1234567';

		$hashed_try = Auth::pass_hash($try);

		echo '<pre>';
		echo $try;
		echo '<hr />';
		echo $hashed_try;


		echo '<hr />';

		$valid = Auth::pass_verify($try, $hashed_try);

		var_dump($valid);

		echo '</pre>';
	}
}

/* 

DATABASE NOTES:
- Password hash should be put in a 255 varchar field.


*/
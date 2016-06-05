<?php

require_once '../../functions.php';

$ajax = (Request::getGetValue('ajax') === 'true');
$result = array();

$username = Request::_POST('username');
$password = Request::_POST('password');

// TODO: CHECK ENTERED VALUES

if (Auth::isLoggedIn())
{
	$result['code'] = 202;
	$result['status'] = 'ERROR';
	$result['error_msg'] = 'Already logged in!';
}
else
{
	try
	{
		if (User::login($username, $password))
		{
			Auth::authUser($username);
			$result['code'] = 101;
			$result['status'] = 'OK';
		}
	}
	catch (Exception $e)
	{
		$error_message = $e->getMessage();
		$result['code'] = 201;
		$result['status'] = 'ERROR';
		$result['error_msg'] = $error_message;
	}
}

returnResult($result, $ajax);
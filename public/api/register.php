<?php

require_once '../../functions.php';

$username = Request::_POST('username');
$email = Request::_POST('email');
$password = Request::_POST('password');
$password_confirm = Request::_POST('password-confirm');

// TODO: CHECK ENTERED VALUES

$ajax = (Request::getGetValue('ajax') === 'true');
$result = array();
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
		if (User::register($username, $password, $email))
		{
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
if (!$ajax)
{
	Request::redirectBack();
}
else
{
	header('Content-type: application/json');
	echo json_encode($result);
}
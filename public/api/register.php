<?php

require_once '../../functions.php';

$ajax = (Request::getGetValue('ajax') === 'true');
$result = array();

$username = Request::_POST('username');
$email = Request::_POST('email');
$password = Request::_POST('password');
$password_confirm = Request::_POST('password-confirm');

// TODO: CHECK ENTERED VALUES
$username = trim($username);
$email = trim($email);

if ($username == '' || $email == '' || $password == '' || $password_confirm == '')
{
	$result['code'] = 203;
	$result['status'] = 'ERROR';
	$result['error_msg'] = 'Please fill out all the required fields.';
	returnResult($result, $ajax);
}

if ($password != $password_confirm)
{
	$result['code'] = 204;
	$result['status'] = 'ERROR';
	$result['error_msg'] = 'The entered passwords do not match!';
	returnResult($result, $ajax);
}
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
returnResult($result, $ajax);
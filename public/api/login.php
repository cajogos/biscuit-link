<?php

require_once '../../functions.php';

$username = Request::_POST('username');
$password = Request::_POST('password');

if (User::login($username, $password))
{
	Auth::authUser($username);
}

Request::redirectBack();
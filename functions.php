<?php

session_start();

function my_autoloader($class)
{
	include 'public/classes/' . $class . '.php';
}
spl_autoload_register('my_autoloader');

function returnResult($result, $ajax = false)
{
	if (!$ajax)
	{
		Request::redirectBack($result);
	}
	else
	{
		header('Content-type: application/json');
		echo json_encode($result);
	}
}

function logInfo($message)
{
	logMsg('INFO: ' . $message);
}
function logSuccess($message)
{
	logMsg('OKAY: ' . $message);
}
function logError($message)
{
	logMsg('FAIL: ' . $message);
}
function logMsg($message)
{
	print $message . '<hr />';
}
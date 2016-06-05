<?php

session_start();

function my_autoloader($class)
{
	include 'public/classes/' . $class . '.php';
}
spl_autoload_register('my_autoloader');


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
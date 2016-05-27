<?php

session_start();

function my_autoloader($class)
{
	include 'public/classes/' . $class . '.php';
}
spl_autoload_register('my_autoloader');
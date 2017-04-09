<?php

/*
 * Initialization file:
 * - Your app does all the smart stuffs here!
 * - You can also switch the development mode ON or OFF here by changing the DEV_MODE global.
 */

// Start session for the current user
session_start();

// Add the configuration file
$config_location = $_SERVER['DOCUMENT_ROOT'] . '/../app/config.php';
if (file_exists($config_location))
{
	require $config_location;
}
else
{
	// TODO: HANDLE FAILED LOADING
}
// Development Mode: Enable (1) or Disable (0) - Comes from config file
if (DEV_MODE)
{
	ini_set('display_errors', DEV_MODE);
	ini_set('display_startup_errors', DEV_MODE);
	error_reporting(E_ALL);
}

// Composer autoload
$vendor_autoload_location = $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';
if (file_exists($vendor_autoload_location))
{
	require $vendor_autoload_location;
}
else
{
	// TODO: HANDLE FAILED LOADING
}

// Load custom classes
spl_autoload_register(function ($class_name)
{
	// Check if Class
	$location = $_SERVER['DOCUMENT_ROOT'] . '/../classes/' . $class_name . '.php';
	if (file_exists($location))
	{
		require_once $location;
	}
	else
	{
		// Check if Controller
		$location = $_SERVER['DOCUMENT_ROOT'] . '/../controllers/' . $class_name . '.php';
		if (file_exists($location))
		{
			require_once $location;
		}
		else
		{
			// Check if Element
			$location = $_SERVER['DOCUMENT_ROOT'] . '/../elements/' . $class_name . '.php';
			if (file_exists($location))
			{
				require_once $location;
			}
			else
			{
				throw new Exception('Could not find class: ' . $class_name);
			}
		}
	}
});
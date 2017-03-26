<?php

/*
 * Initialization file:
 * - Your app does all the smart stuffs here!
 * - You can also switch the development mode ON or OFF here by changing the DEV_MODE global.
 */

// TODO: Move app configuration to a different file!

// Development Mode: Enable (1) or Disable (0)
define('DEV_MODE', 1);
if (DEV_MODE)
{
    ini_set('display_errors', DEV_MODE);
    ini_set('display_startup_errors', DEV_MODE);
    error_reporting(E_ALL);
}

// Start session here
session_start();

// Add the app_config.php file
require $_SERVER['DOCUMENT_ROOT'] . '../../../config/app_config.php';

// Composer autoload
require $_SERVER['DOCUMENT_ROOT'] . '../../vendor/autoload.php';

// Load custom classes
spl_autoload_register(function ($class_name)
{
    include $_SERVER['DOCUMENT_ROOT'] . '../../classes/' . $class_name . '.php';
});
<?php

require_once '../functions.php';

$db = Database::get();

/* CREATING THE USERS TABLE
	1 - First drop the table if already exists.
	2 - Create the table using the defined defaults.
	3 - Create default admin user. TODO
*/
logInfo('Creating the users table');
$table_name = User::DATABASE_TABLE;
$sql = 'DROP TABLE IF EXISTS ' . $table_name;
$st = $db->prepare($sql);
$st->execute();
$sql = 'CREATE TABLE ' . $table_name . '(';
$sql .= 'user_id INT NOT NULL AUTO_INCREMENT,';
$sql .= 'user_username VARCHAR(' . Config::get()->user->username_max_length . ') NOT NULL UNIQUE,';
$sql .= 'user_password VARCHAR(255) NOT NULL,';
$sql .= 'user_email VARCHAR(255) NOT NULL,';
$sql .= 'user_level INT(2) NOT NULL DEFAULT 0,';
$sql .= 'user_registered DATETIME NOT NULL,';
$sql .= 'last_modified TIMESTAMP NOT NULL,';
$sql .= 'PRIMARY KEY (user_id)';
$sql .= ');';
$st = $db->prepare($sql);
if ($st->execute())
{
	logSuccess('Created users table!');
}
else
{
	logError('Failed to create users table');
	exit;
}
logInfo('Creating the admin account');
if (User::register('admin', 'admin1234', 'c@rlos.info'))
{
	logSuccess('Created the admin account!');
}
else
{
	logError('Failed to create the admin account :(');
	exit;
}

// TODO: SET USER LEVEL TO BE ADMIN - GET CREATED USER - CHANGE USER LEVEL

logInfo('COMPLETED THE INSTALLATION OF COOKIE JAR YAY!');
logInfo('Please delete the install.php script.');
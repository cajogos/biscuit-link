<?php

/*
 * This is your index file which is called from your Web Server.
 * You are advised not to change this file unless extremely necessary.
 */

// Initialise your application
require_once $_SERVER['DOCUMENT_ROOT'] . '/../app/init.php';

// Include the routes for your application
require_once $_SERVER['DOCUMENT_ROOT'] . '/../app/routes.php';

exit;
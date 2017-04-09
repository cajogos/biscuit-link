<?php
/*
 * Routing of your application's pages
 *
 * - Routing is done using AltoRouter (http://altorouter.com/usage/mapping-routes.html)
 */

$router = new AltoRouter();

// Application mappings
$router->map('GET', '/', 'IndexController::display', 'index');
$router->map('GET', '/hello', 'PageTest::helloPage');


// Page functions
require_once $_SERVER['DOCUMENT_ROOT'] . '/../app/page_functions.php';

/**
 * Function that handles the AltoRouter object - must be present in order for your routes to work
 * @param AltoRouter $router
 */
function handleRouting(AltoRouter $router)
{
	$match = $router->match();
	if ($match && is_callable($match['target']))
	{
		call_user_func_array($match['target'], $match['params']);
	}
	else
	{
		handle404Page();
	}
}
handleRouting($router);
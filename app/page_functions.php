<?php

function handleIndexPage()
{
	$tpl = Template::create('pages/cookie-jar.tpl');
	$tpl->display();
}

// 404 page
function handle404Page()
{
	header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
	$tpl = Template::create('pages/404.tpl');
	$tpl->display();
}

/** Handle Routing **/

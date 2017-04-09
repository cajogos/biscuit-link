<?php

function handleHelloWorldPage()
{
	$tpl = Template::create('pages/hello.tpl');
	$tpl->assign('page_title', 'Hello World!');
	$tpl->display();
}

// 404 page
function handle404Page()
{
	header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
	$tpl = Template::create('pages/404.tpl');
	$tpl->display();
}
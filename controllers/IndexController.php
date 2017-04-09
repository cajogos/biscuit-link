<?php

/**
 * Class IndexController
 */
class IndexController extends Controller
{
	public static function display2()
	{
		$tpl = Template::create('pages/cookie-jar.tpl');
		$tpl->assign('cookie_jar_ver', COOKIE_JAR_VERSION);
		$tpl->display();
	}

	public static function hello($name = null, $say = null)
	{
		if (is_null($name))
		{
			$name = 'World';
		}
		if (is_null($say))
		{
			$say = 'Hello';
		}
		$tpl = Template::create('pages/hello.tpl');
		$tpl->assign('say', $say);
		$tpl->assign('name', $name);
		$tpl->display();
	}
}
<?php

class IndexController implements Controller
{
	public static function display()
	{
		$tpl = Template::create('pages/cookie-jar.tpl');
		$tpl->assign('cookie_jar_ver', COOKIE_JAR_VERSION);
		$tpl->display();
	}
}
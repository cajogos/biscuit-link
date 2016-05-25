<?php

class Page
{
	const RESOURCE_PATH_CSS = 'resources/css/';
	const RESOURCE_PATH_JS = 'resources/js/';
	private static $title = null;
	private static $dir_level = 0;

	public static function setTitle($page_title)
	{
		Page::$title = $page_title;
	}
	public static function getTitle()
	{
		if (empty(Page::$title))
		{
			return Config::getSiteConfig('NAME');
		}
		return Page::$title;
	}
	public static function setDirLevel($level)
	{
		Page::$dir_level = $level;
	}
	public static function getDirLevel()
	{
		return Page::$dir_level;
	}
	public static function getDirPath()
	{
		$str = '';
		for ($i = 0; $i < Page::$dir_level; $i++)
		{
			$str .= '../';
		}
		return $str;
	}
	public static function getLink($file_path)
	{
		return Page::getDirPath() . $file_path;
	}
	public static function displayElement($element)
	{
		Element::getFromPage($element);
	}
	public static function addCSSFile($css_file)
	{
		$href = Page::getDirPath() . Page::RESOURCE_PATH_CSS . $css_file . '.css';
		return '<link rel="stylesheet" href="' . $href . '" />';
	}
	public static function addJSFile($js_file)
	{
		$src = Page::getDirPath() . Page::RESOURCE_PATH_JS . $js_file . '.js';
		return '<script type="text/javascript" src="' . $src . '"></script>';
	}
}

/*<a href="<?= Page::getDirPath() ?>account/login.php">Login</a>*/
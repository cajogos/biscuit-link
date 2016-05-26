<?php

class Page
{
	// TODO: Automatically detect directory level
	// NOTE: MIGHT NEED TO HARDCODE THE FILE PATH PRIOR TO DETECTION
	// DOCUMENT_ROOT DOESNT WORK AS EXPECTED
	// BREAK DOWN THE VALUES USING EXPLODE

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
			$title = Config::get()->site->name;
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
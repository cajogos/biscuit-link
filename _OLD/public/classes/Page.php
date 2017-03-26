<?php

class Page
{
	// TODO: Automatically detect directory level
	// NOTE: MIGHT NEED TO HARDCODE THE FILE PATH PRIOR TO DETECTION

	const RESOURCE_PATH_IMAGES = 'resources/images/';
	const RESOURCE_PATH_CSS = 'resources/css/';
	const RESOURCE_PATH_JS = 'resources/js/';
	private static $title = null;
	private static $dir_level = 0;

	public static function setTitle($page_title)
	{
		self::$title = $page_title;
	}
	public static function getTitle()
	{
		if (empty(self::$title))
		{
			$title = Config::get()->site->name;
			return Config::getSiteConfig('NAME');
		}
		return self::$title;
	}
	public static function setDirLevel($level)
	{
		self::$dir_level = $level;
	}
	public static function getDirLevel()
	{
		return self::$dir_level;
	}
	public static function getDirPath()
	{
		$str = '';
		for ($i = 0; $i < self::$dir_level; $i++)
		{
			$str .= '../';
		}
		return $str;
	}
	public static function getLink($file_path)
	{
		return self::getDirPath() . $file_path;
	}
	public static function displayElement($element)
	{
		Element::getFromPage($element);
	}
	public static function addCSSFile($css_file)
	{
		$href = self::getDirPath() . self::RESOURCE_PATH_CSS . $css_file . '.css';
		return '<link rel="stylesheet" href="' . $href . '" />';
	}
	public static function addJSFile($js_file)
	{
		$src = self::getDirPath() . self::RESOURCE_PATH_JS . $js_file . '.js';
		return '<script type="text/javascript" src="' . $src . '"></script>';
	}
	public static function getImgPath($file)
	{
		return self::getDirPath() . self::RESOURCE_PATH_IMAGES . $file;
	}
	public static function addImage($file, $alt = null, $title = null, $css_class = null)
	{
		$src = self::getImgPath($file);
		$html = '<img src="' . $src . '"';
		if (!empty($alt))
		{
			$html .= ' alt="' . $alt . '"';
		}
		if (!empty($title))
		{
			$html .= ' title="' . $title . '"';
		}
		if (!empty($css_class))
		{
			$html .= ' class="' . $css_class . '"';
		}
		$html .= ' />';
		return $html;
	}
}
<?php

class Element
{
	const FOLDER_PATH = 'elements/';
	private $file_name;

	private function __construct($file_name)
	{
		$this->file_name = $file_name;
	}
	public function getFileName()
	{
		return $this->file_name;
	}
	public function display()
	{
		$file_path = Element::FOLDER_PATH . $this->file_name . '.php';
		require_once $file_path;
	}
	public static function get($file_name)
	{
		return new Element($file_name);
	}
	public static function getFromPage($file_name)
	{
		$element  = Element::get($file_name);
		$file_path = Page::getDirPath() . Element::FOLDER_PATH . $element->getFileName() . '.php';
		require_once $file_path;
	}
}
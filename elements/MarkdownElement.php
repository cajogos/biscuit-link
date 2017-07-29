<?php

use Cajogos\Biscuit\Template as Template;
use Cajogos\Biscuit\Element as Element;

/**
 * Class MarkdownElement
 * - Use this element to load an external .md file.
 * - Place markdown files in the /templates/markdown folder where you will find the test.md file.
 * - Set file like $element->setFile('test'); for a file like /templates/markdown/test.md
 */
class MarkdownElement extends Element
{
	private $parsedown = null;
	private $file = null;

	public function __construct()
	{
		$this->parsedown = new Parsedown();
	}

	public function setFile($file)
	{
		$this->file = $file;
	}

	public function getString()
	{
		$file_contents = @file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/../templates/markdown/' . $this->file . '.md');

		if ($file_contents !== false)
		{
			return $this->parsedown->text($file_contents);
		}
		return 'Markdown file not found!';
	}
}
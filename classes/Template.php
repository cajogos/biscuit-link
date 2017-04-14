<?php

class Template
{
	private $smarty, $file = null;

	private function __construct()
	{
		$template_dir = $_SERVER['DOCUMENT_ROOT'] . '/../templates/';
		$compile_dir = '/tmp/biscuit-link-templates/';
		$this->smarty = new Smarty();
		$this->smarty->setTemplateDir($template_dir);
		$this->smarty->setCompileDir($compile_dir);

		// Force compiling of templates in development mode
		if (DEV_MODE)
		{
			$this->smarty->force_compile = true;
			$this->smarty->compile_check = true;
		}
	}

	public static function create($template_path)
	{
		$template = new Template();
		$template->setFile($template_path);
		return $template;
	}

	public function getFile()
	{
		return $this->file;
	}

	public function setFile($file)
	{
		$this->file = $file;
	}

	public function assign($key, $value)
	{
		$this->smarty->assign($key, $value);
	}

	public function addElement($element_id, Element $element)
	{
		if (!is_a($element, 'Element'))
		{
			throw new Exception('You MUST add an Element object when using addElement function');
		}
		$this->smarty->assign($element_id, $element->getString());
	}

	public function display()
	{
		try
		{
			$this->smarty->display($this->getFile());
		}
		catch (SmartyException $e)
		{
			echo '<h1 style="color:red">Biscuit Link Template Exception!</h1>';
			echo '<h1>' . $e->getMessage() . '</h1>';
			echo '<pre style="max-width: 500px;">';
			print_r(debug_print_backtrace(2));
			echo '</pre>';
			exit;
		}
	}

	public function getString()
	{
		return $this->smarty->fetch($this->getFile());
	}
}
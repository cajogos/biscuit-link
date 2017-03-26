<?php

class Template
{
	private $smarty, $file = null;

	private function __construct()
	{
		$template_dir = $_SERVER['DOCUMENT_ROOT'] . '/../templates/';
		$compile_dir = '/tmp/cookie-jar-templates/';
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

	public static function create($file)
	{
		$template = new Template();
		$template->setFile($file);
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

	public function display()
	{
		try
		{
			$this->smarty->display($this->getFile());
		}
		catch (SmartyException $e)
		{
			echo '<h1 style="color:red">Template Exception!</h1>';
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
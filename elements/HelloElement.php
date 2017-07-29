<?php

use Cajogos\Biscuit\Template as Template;
use Cajogos\Biscuit\Element as Element;

/**
 * Class HelloElement
 *
 * An example of how to create an Element.
 */
class HelloElement extends Element
{
	private $name;
	private $saying;

	public function setName($name)
	{
		$this->name = ucfirst($name);
	}

	public function setSaying($saying)
	{
		$this->saying = ucfirst($saying);
	}

	public function getString()
	{
		$tpl = Template::create('elements/hello.tpl');
		$tpl->assign('name', $this->name);
		$tpl->assign('saying', $this->saying);
		return $tpl->getString();
	}
}
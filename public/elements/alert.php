<?php

class AlertElement
{
	private $class = null;
	private $dismissable = false;

	private function __construct()
	{
		// TODO
	}

	public function getString()
	{
		// TODO
	}

	public static function getFromSession()
	{
		// TODO
	}
}

// $element = AlertElement::getFromSession();
// print $element->getString();
// $class = 'alert-success';

?>
<div class="alert <?= $class ?>">Test</div>
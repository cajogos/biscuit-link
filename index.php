<?php

require_once 'functions.php';

Page::setTitle('Home');
Page::setDirLevel(0);

?>

<?php Page::displayElement('header'); ?>

<h1>Welcome <span class="fa fa-star"></span></h1>

<form method="get" action="">
<input type="text" name="test" />
<input type="submit" />
</form>

<?php Page::displayElement('footer'); ?>
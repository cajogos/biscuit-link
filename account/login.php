<?php

require_once '../functions.php';

Page::setTitle('Login Page');
Page::setDirLevel(1);

//var_dump(getcwd(), __DIR__, __FILE__, $_SERVER['DOCUMENT_ROOT']);

?>

<?php Page::displayElement('header'); ?>

<h1>Login</h1>

<img src="<?= Page::getImgPath('compasses.png'); ?>" alt="compasses" />

<?php Page::displayElement('footer'); ?>
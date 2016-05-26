<?php

require_once 'functions.php';

Page::setTitle('Home');
Page::setDirLevel(0);

?>

<?php Page::displayElement('header'); ?>

<h1>Welcome <span class="fa fa-star"></span></h1>

<h2>This is Cookie Jar</h2>

<img src="<?= Page::getImgPath('compasses.png'); ?>" alt="compasses" />


<?= Page::addImage('compasses.png', 'This is an image of compasses', 'Compasses'); ?>

<?php Page::displayElement('footer'); ?>
<!DOCTYPE html>
<html>
<head>
	<title><?= Page::getTitle() ?></title>
	<!-- Stylesheets -->
	<?= Page::addCSSFile('style'); ?>
</head>
<body>
<div class="container">
<!-- Header Starts here -->
<?php Page::displayElement('navbar'); ?>
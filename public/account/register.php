<?php

require_once '../../functions.php';

Page::setTitle('Register Page');
Page::setDirLevel(1);

?>

<?php Page::displayElement('header'); ?>

<h1>Register</h1>

<div class="login-form-container">
<form action="" method="post">
	<div class="form-group">
		<label for="username">Username:</label>
		<input type="text" name="username" class="form-control" />
	</div>
	<div class="form-group">
		<label for="email">Email:</label>
		<input type="text" name="email" class="form-control" />
	</div>
	<div class="form-group">
		<label for="password">Password:</label>
		<input type="password" name="password" class="form-control" />
	</div>
	<div class="form-group">
		<label for="password-confirm">Password Confirm:</label>
		<input type="password-confirm" name="password-confirm" class="form-control" />
	</div>
	<button type="submit" class="btn btn-primary">Register</button>
</form>
</div>


<a href="../api/logout.php">LOGOUT</a>

<?php Page::displayElement('footer'); ?>
<?php

require_once '../../functions.php';

Page::setTitle('Login Page');
Page::setDirLevel(1);

?>

<?php Page::displayElement('header'); ?>

<h1>Login <?php var_dump(Auth::isLoggedIn()); ?></h1>

<div class="login-form-container">
<form action="../api/login.php" method="post">
	<div class="form-group">
		<label for="username">Username:</label>
		<input type="text" name="username" class="form-control" />
	</div>
	<div class="form-group">
		<label for="password">Password:</label>
		<input type="password" name="password" class="form-control" />
	</div>
	<button type="submit" class="btn btn-primary">Login</button>
</form>
</div>


<a href="../api/logout.php">LOGOUT</a>

<?php Page::displayElement('footer'); ?>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
				ata-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				<?= Config::get()->site->name; ?>
			</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li>
					<a href="<?= Page::getLink(''); ?>">
						<span class="fa fa-home"></span> Home
					</a>
				</li>
				<li>
					<a href="<?= Page::getLink('account/login.php'); ?>">
						<span class="fa fa-key"></span> Login
					</a>
				</li>
				<li>
					<a href="#">Contact</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"
						role="button" aria-haspopup="true" aria-expanded="false">
						Dropdown <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="#">Action</a>
						</li>
						<li>
							<a href="#">Another action</a>
						</li>
						<li>
							<a href="#">Something else here</a>
						</li>
						<li role="separator" class="divider"></li>
						<li class="dropdown-header">Nav header</li>
						<li>
							<a href="#">Separated link</a>
						</li>
						<li>
							<a href="#">One more separated link</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
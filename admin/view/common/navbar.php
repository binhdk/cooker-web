
<nav class="navbar navbar-inverse " role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="admin.php"><i class="glyphicon glyphicon-th-large"></i>Quản trị hệ thống</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<?php if(isset($user)): ?>
			<ul class="nav navbar-nav navbar-right">
			   <li><a href="admin.php?controller=home&action=logout" style="font-size: 17px;"><i class="glyphicon glyphicon-off"></i> Thoát </a></li>
			</ul>
			<?php endif; ?>
		</div>
	</div>
</nav>
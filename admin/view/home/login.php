<?php require('admin/view/common/header.php'); ?>
<body id="login">

<nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="admin.php"><i class="glyphicon glyphicon-th-large"></i> Administrator</a>
        </div>
    </div>
</nav>

    <div class="container">
        <form method="post" action="admin.php?controller=home&action=login" class="form-signin" role="form">
            <div class="form-group">
            	<input name="email" type="email" class="form-control input-lg" placeholder="Email" required autofocus>
            </div>
            <div class="form-group">
            	<input name="password" type="password" class="form-control input-lg" placeholder="Password" required>
            </div>            
            <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng nhập</button>
        </form>
    </div> 
    
</body>
</html>
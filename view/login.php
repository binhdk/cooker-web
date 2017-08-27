<?php
require_once ('dao/UserDao.class.php');
  if(isset($_POST['email'])&&isset($_POST['password'])) {
      $email = ($_POST['email']);
      $password = ($_POST['password']);
      UserDao::userLogin($email,$password);
  }  
?>
<!-- call view -->
<ul class="nav navbar-nav navbar-right">
  <?php
    if(isset($_SESSION['user']))
      include 'logout.php';
    else
      include 'login-section.php';
  ?>
</ul>
      


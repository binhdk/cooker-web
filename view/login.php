<?php
if (isset($_POST['email'])&&isset($_POST['password'])) {
    $email = ($_POST['email']);
    $password =$_POST['password'];
    $customerController =new controller\CustomerController;
    $customer=$customerController->login($email, $password);
}
?>
<!-- call view -->
<ul class="nav navbar-nav navbar-right">
  <?php
    if(isset($_SESSION['customer']))
      include 'logout.php';
    else
      include 'login-section.php';
  ?>
</ul>
      


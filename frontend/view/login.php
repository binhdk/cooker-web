<?php 
 if(!empty($_SESSION['customer']))
 	require 'logout-section.php';
 else
 	require 'login-section.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $is_logged = (new frontend\model\CustomerModel)->login($email, $password);
    if($is_logged === true) 
       header('location:/cooker');
    else 
      echo "<script>alert('Wrong email or password');</script>";
}
?>
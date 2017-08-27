<?php
	if (isset($_POST['email'])&&isset($_POST['password'])) {
   	 	$email = ($_POST['email']);
    	$password =$_POST['password'];
    	$userController =new controller\UserController;
    	$user=$userController->login($email, $password);
    }
    	if (isset($_SESSION['user'])) {
    		header('location:admin.php');
		}
$title = 'Đăng nhập hệ thống';
require('admin/view/home/login.php');
?>
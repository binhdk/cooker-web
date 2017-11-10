<?php
if (isset($_POST['email'])&&isset($_POST['password'])) {
   	$email = ($_POST['email']);
    $password = $_POST['password'];
    $userModel = new admin\model\UserModel;
    $is_logged = $userModel->login($email, $password);
    if($is_logged === false) 
        echo "<script>alert('Wrong email or password');</script>" ;
   }
if (isset($_SESSION['user'])) {
    header('location:admin.php');
}

$title = 'Đăng nhập hệ thống';
require('admin/view/home/login.php');
?>
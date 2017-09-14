<?php
if (isset($_POST['submit'])) {
    $customerDao = $factory->getDao(utils\enum\DaoEnum::CUSTOMER);
    $email = $_POST['email'];
    $exist =  $customerDao->getCustomer(array('select' => 'email', 'where' => "email='$email'"));
    if (!empty($exist)) {
        echo "<script>window.alert('Email đã tồn tại');window.history.back();</script>";
    } else {
        $date = new DateTime();
        $customer = array(
            'email'=>$_POST['email'],
            'name' => $_POST['name'],
            'password'=> password_hash($_POST['password'],PASSWORD_DEFAULT,['cost' => 12]),
            'tel'=> intval($_POST['tel']),
            'created' => $date->getTimestamp(),
            'modified' => $date->getTimestamp()
        );
        $id = (new model\CustomerModel)->register($customer);
        if($id > 0){
            echo "<script>alert('Đăng ký thành công');</script>";
            (new model\CustomerModel())->login($email,$customer['password']);
        } else {
            echo "<script>alert('Có lỗi xảy ra trong qua trình xử lý, vui lòng quay lại sau!');";
            echo "window.location.href='register/';</script>";
    }
  } 
}

// call view
 require_once 'view/customer/register.php';
?>
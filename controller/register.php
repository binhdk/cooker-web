<?php 
  // call Dao
  include_once('dao/UserDao.class.php');

  if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $exit=BaseDao::selectone("select * from users where email='$email'");
    if($exit['email']== $email){
      echo "<script type=\"text/javascript\">"."alert('Email đã tồn tại');"."history.back();</script>";
    } else{
      $user=array(
       'email'=>$_POST['email'],
       'tenkhachhang' => $_POST['ten'],
       'password'=>password_hash($_POST['password'],PASSWORD_DEFAULT,['cost' => 12]),
       'diachi'=>$_POST['diachi'],
       'dienthoai'=>$_POST['dienthoai'],
       'sothanhvien'=>intval($_POST['number']),
       'sothich'=>$_POST['sothich']
      );
      $id_user=UserDao::themUser($user);
      
      if($id_user){
        echo "<script type=\"text/javascript\">"."alert('Đăng ký thành công');"."</script>";
        UserDao::userLogin($_POST['email'],$_POST['password']);
        header('location:index.php');
      } else{
        echo "lỗi";
      }
    } 
  }

  // call view
   require_once 'views/component/dangky.php';
?>
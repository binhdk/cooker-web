<?php
// call model 
use dao;
if (isset($_POST['id_donhang'])) {
	$donhang = array(
		'trangthai' =>'1',
		'id_donhang' => intval($_POST['id_donhang'])
		
	);
	DonHangDao::xuLyDonHang("update donhang set trangthai=? where id_donhang=?",$donhang);	
	header('location:admin.php?controller=donhang');
}
if(isset($_GET['id'])){
   $id=$_GET['id'];
   $donhang=DonHangDao::xemDonHang($id);
   $khachhang=UserDao::timUser($donhang['id_user']);
   $title = 'Chi tiết đơn hàng';
   $admin = $_SESSION['admin'];
   require('views/admin/donhang/chitiet.php');

}

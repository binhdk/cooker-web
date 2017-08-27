<?php
  // call model
  include_once('dao/DonHangDao.class.php');
  include_once('dao/MonAnDao.class.php');
  function themDonHang($id){
    if(isset($_SESSION['giohang'][$id])){
      $_SESSION['giohang'][$id]['soluong']++;
    } else {
      $monan = MonAnDao::xemMonAn($id);
      $_SESSION['giohang'][$id] = array(
        'id_monan' => $id,
        'tenmonan' => $monan['tenmonan'],
        'hinhanh' => $monan['hinhanh'],
        'soluong' => 1,
        'gia' => doubleval($monan['gia'])
      );
    }
  }

  function luuDonHang(){
	if (!empty($_POST)) {
	  $donhang = array(
		'id_user' =>$_SESSION['user']['id_user'],
		'diachi' =>$_SESSION['user']['diachi'],
		'dienthoai' =>$_SESSION['user']['dienthoai'],
		'ngaydat' => gmdate('Y-m-d H:i:s', time()+7*3600)
	  );
	  $id_donhang = DonHangDao::themDonHang($donhang);

	  $giohang = listdonhang();
	  foreach ($giohang as $monan) {
		$chitiet = array(
		  'id_donhang' =>$id_donhang,
		  'id_monan' => intval($monan['id_monan']),
		  'soluong' => intval($monan['soluong'])
		);
		Dao::insert('chitietdonhang',$chitiet);
		 $_SESSION['giohang'] = array();
	  }
	  echo "<h1 >Đặt hàng thành công</h1>";
    } else {
	  header('location:.');
    }
  }

  function capNhatDonHang($id, $soluong){
    if($soluong==0){
      unset($_SESSION['giohang'][$id]);
    } else {
      $_SESSION['giohang'][$id]['soluong'] = $soluong;
    }
  }

  function tongTien(){
    $total = 0;
    foreach($_SESSION['giohang'] as $monan){
      $total += $monan['gia'] * $monan['soluong'];
    }
    return $total;
  }

  function soluong_donhang(){
    $soluong = 0;
    foreach($_SESSION['giohang'] as $monan){
      $soluong += $monan['soluong'];
    }
    return $soluong;
  }

  function listdonhang(){
    return $_SESSION['giohang'];
  }
  if(!isset($_SESSION['giohang'])) $_SESSION['giohang'] = array();
	if(isset($_GET['task'])){
	  $task=$_GET['task'];
	  switch ($task) {
	    case 'mua':
	      if(!isset($_SESSION['user'])){
	    	echo "<script>alert('Vui lòng đăng nhập để mua hàng') ;window.location.href ='index.php?action=giohang'; </script>";
	      }
	      else{
	    	luuDonHang();
	      }
	    break;
	    	
	    case 'xoa':
	      unset($_SESSION['giohang'][$_GET['id_xoa']]);
	      header('location:index.php?action=giohang');
	      break;
	}
  }else{
	  if(isset($_GET['id'])) {
		$id=$_GET['id'];
		themDonHang($id);
	  }

    // call view
    require_once 'views/component/giohang.php';
  }
?>
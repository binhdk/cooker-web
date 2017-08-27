<?php
//load model
require_once('dao/MonAnDao.class.php');
require_once('dao/DanhMucDao.class.php');
require_once 'utils/upload_image.php';


// nếu chọn sửa/thêm 
if (!empty($_POST)) {
	$tenmonan = mysql_real_escape_string($_POST['tenmonan']);

	$monan = array(
		'tenmonan' => $tenmonan,
		'id_loai' => intval($_POST['id_loai']),
    'thanhphan'=>mysql_real_escape_string($_POST['thanhphan']),
    'gia' => doubleval(str_replace('.', '',$_POST['gia'])),
    'mota'=>$_POST['mota'],
		'id_monan' => intval($_POST['id_monan'])
	);
    if($monan['id_monan']){
      $id_monan=$monan['id_monan'];
      $sql='update monan set tenmonan=?, id_loai=?,thanhphan=?,gia=?,mota=?  where id_monan=?';
       MonAnDao::suaMonAn($sql,$monan);
   }
   else  $id_monan=MonAnDao::themMonAn($monan);

	//upload ảnh
   $tenhinh=alias($tenmonan);
    $config = array(
      'name' => $tenhinh,
        'upload_path'  => 'uploads/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    );

    $hinhanh = upload('hinhanh', $config);
    
    // cập nhật ảnh mới
    if($hinhanh){
    	$monan = array(
    		'hinhanh' => $hinhanh,
        'id_monan' => $id_monan
    	);
    	 MonAnDao::suaMonAn("update monan set hinhanh=? where id_monan=? ",$monan);
    }
	header('location:admin.php?controller=monan');
}

if (isset($_GET['id'])) $id = intval($_GET['id']); else $id=0;
$title = ($id==0) ? 'Thêm món ăn' : 'Sửa món ăn';
$user = $_SESSION['user'];
$monan = MonAnDao::xemMonAn($id);
$danhmuc = DanhMucDao::xemDS();
//load view
require('views/admin/monan/sua.php');
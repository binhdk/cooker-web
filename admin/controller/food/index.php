<?php
require_once('dao/MonAnDao.class.php');
require_once 'utils/function.php';
if(isset($_GET['page'])) 
    	$page=intval($_GET['page']);
    else 
    	$page=1;
$page=($page>0) ?$page:1;
$limit=5;
$offset=($page-1)*$limit;
$sql;
$result=array();
$keySearch=null;
if(isset($_POST['search']))
    $keySearch=$_POST['search'];
if(isset($_GET['search']))
	$keySearch=$_GET['search'];
if($keySearch!=null){
    $sql="select * from monan where tenmonan like '%$keySearch%' LIMIT ".$offset.",".$limit;
    $result=MonAnDao::timKiemMonAn($keySearch);
    $url="admin.php?controller=food&search=$keySearch";
}else{
	$sql="select * from monan LIMIT ".$offset.",".$limit;
    $result=MonAnDao::xemDS();
     $url="admin.php?controller=food";
}
$total_rows=count($result);
$total_page = ceil($total_rows/$limit);
$pagination = pagination($url, $page, $total_page);
$monan = BaseDao::selectall($sql);
$title = 'Món ăn';
$admin = $_SESSION['admin'];

require('admin/view/food/index.php');
?>
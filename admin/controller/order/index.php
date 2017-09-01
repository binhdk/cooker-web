<?php
if(isset($_GET['page'])) 
    	$page=intval($_GET['page']);
    else 
    	$page=1;
$page=($page>0) ?$page:1;
$limit=5;
$offset=($page-1)*$limit;
$sql="select * from donhang LIMIT ".$offset.",".$limit;
$total_rows=count(BaseDao::selectall("select * from donhang"));
$total_page = ceil($total_rows/$limit);
$url="admin.php?controller=order";
$pagination = pagination($url, $page, $total_page);

$ds_donhang=BaseDao::selectall($sql);
//load view
$title = 'Đơn hàng';
$admin = $_SESSION['admin'];
require('admin/view/order/index.php');
?>
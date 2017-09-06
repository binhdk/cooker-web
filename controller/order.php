<?php

if(isset($_SESSION['customer']))
    $customer_id=$_SESSION['customer']['id'];
$ds_iddonhang=array();
$ds_iddonhang=BaseDao::selectall("select * from donhang where id_user='$id_user'");
$ds_donhang=array();

foreach ($ds_iddonhang as $key) {
  	$id_donhang=$key['id_donhang'];
    $ds_donhang[$id_donhang]=
    BaseDao::selectall("select * from chitietdonhang where id_donhang='$id_donhang'");
}
$chitiet=array();
$soluong=array();
foreach ($ds_donhang as $donhang) {
  	foreach ($donhang as $key) {
  	    $soluong[$key['id_monan']]=$key['soluong'];
  	    $id_chitiet=$key['id_monan'];
        $chitiet[$key['id_donhang']][]=BaseDao::selectone("select * from monan where id_monan='$id_chitiet'");
    }
}
  // call model
  include 'view/order.php';
?>
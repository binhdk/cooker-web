<?php 
include_once('dao/MonAnDao.class.php');
	require_once 'utils/function.php';
    if(isset($_GET['id'])) $id_loai=$_GET['id'];
    if(isset($_GET['page'])) 
    	$page=intval($_GET['page']);
    else 
    	$page=1;
    $page=($page>0) ?$page:1;
    $limit=6;
    $offset=($page-1)*$limit;
    $sql="select * from monan where id_loai='$id_loai' LIMIT ".$offset.",".$limit;
    $total_rows=count(BaseDao::selectall("select * from monan where id_loai='$id_loai'"));
    $total_page = ceil($total_rows/$limit);
    $url="index.php?action=chitietloaimonan&id=$id_loai";
    $pagination = pagination($url, $page, $total_page);
     $monan = BaseDao::selectall($sql);
     require_once 'views/component/chitietloaimonan.php';
 ?>
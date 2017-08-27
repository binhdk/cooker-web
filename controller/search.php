<?php 
  // call model
  require_once 'utils/function.php';
  include_once('dao/MonAnDao.class.php');

  $textTimKiem="";
  if(isset($_POST['textTimKiem']))
      $textTimKiem=$_POST['textTimKiem'];
  if(isset($_GET['keyWord']))
      $textTimKiem=$_GET['keyWord'];

  // panigation
  if(isset($_GET['page'])) 
      $page=intval($_GET['page']);
  else 
      $page=1;
  $page=($page>0) ?$page:1;
  $limit=6;
  $offset=($page-1)*$limit;
  
  $sql="select * from monan  where tenmonan like '%$textTimKiem%' LIMIT $offset,$limit";
  $result= MonAnDao::timKiemMonAn($textTimKiem);
  $total_rows=count($result);
  $total_page = ceil($total_rows/$limit);
  $url="index.php?action=timkiem&keyWord=$textTimKiem";

  $pagination = pagination($url, $page, $total_page);
  $monan = BaseDao::selectall($sql);

  // call view
  require_once 'views/component/search.php';
?>
<?php
  // call model
  require_once 'utils/function.php';
  require_once('dao/MonAnDao.class.php');
  
  if(isset($_GET['page'])) 
      $page=intval($_GET['page']);
  else 
      $page=1;
  $page=($page>0) ?$page:1;
  $limit=9;
  $offset=($page-1)*$limit;
  $sql="select * from monan LIMIT ".$offset.",".$limit;
  $total_rows=count(BaseDao::selectall("select * from monan"));
  
  $total_page = ceil($total_rows/$limit);
  $url="index.php?action=trangchu";
  $pagination = pagination($url, $page, $total_page);
  $monan = BaseDao::selectall($sql);

  // cal view
  require_once 'view/main-content.php';
?>
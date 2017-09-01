<?php
$foodDao = $factory->getDao(utils\enum\DaoEnum::FOOD);

if (isset($_GET['page'])) 
    $page=intval($_GET['page']);
else 
    $page=1;
$page=($page>0) ?$page:1;
$limit=9;
$offset=($page-1)*$limit;
$sql="select * from food LIMIT ".$offset.",".$limit;
$total_rows=count($foodDao->getAll());
  
$total_page = ceil($total_rows/$limit);
$url="index.php?view=home";
$pagination = pagination($url, $page, $total_page);
$foods = $foodDao->get($sql, null);

  // cal view
  require_once 'view/main-content.php';
?>
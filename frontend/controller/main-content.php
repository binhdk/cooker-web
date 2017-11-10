<?php
$foodDao = $factory->getDao(utils\enum\DaoEnum::FOOD);

if (isset($_GET['page'])) 
    $page=intval($_GET['page']);
else 
    $page=1;
$page=($page>0) ?$page:1;
$limit=9;
$offset=($page-1)*$limit;
$options = array(
    'offset' => $offset,
    'limit' => $limit
);
$total_rows=count($foodDao->getAll());
  
$total_page = ceil($total_rows/$limit);
$url="home/?";
$pagination = utils\Help::pagination($url, $page, $total_page);
$foods = $foodDao->getAll($options);

  // cal view
  require_once 'frontend/view/main-content.php';
?>
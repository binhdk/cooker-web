<?php 

if(isset($_GET['id']))
    $category_id=$_GET['id'];
if(isset($_GET['page'])) 
    $page=intval($_GET['page']);
else 
    $page=1;
$page=($page>0) ?$page:1;
$limit=6;
$offset=($page-1)*$limit;
$foodDao = $factory->getDao(utils\enum\DaoEnum::FOOD);
$options = array('where' => "category_id=$category_id");
$total_rows=count($foodDao->getAll($options));
$total_page = ceil($total_rows / $limit);
$url=".?view=food-category-detail&id=$category_id";
$pagination = pagination($url, $page, $total_page);
$options['offset'] = $offset;
$options['limit'] = $limit;
$foods = $foodDao->getAll($options);
require 'view/food-category-detail.php';
?>
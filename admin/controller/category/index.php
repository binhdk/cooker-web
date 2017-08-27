<?php
require_once 'utils/function.php';
use dao as dao;
use utils\enum as enum;
if(isset($_GET['page'])) {
    $page = ntval($_GET['page']);
}
else {
	$page=1;
}
    	
$page = ($page>0) ? $page : 1;
$limit = 5;
$offset = ($page-1)*$limit;
$factory = dao\AbstractDaoFactory::getDaoFactory(enum\FactoryEnum::MYSQL);
$categoryDao = $factory->getDao(enum\DaoEnum::CATEGORY);

$sql = "select * from category LIMIT " . $offset . ", " . $limit;
$total_rows = count($categoryDao->getAll());
$total_page = ceil($total_rows/$limit);
$url = "admin.php?controller=category";
$pagination = pagination($url, $page, $total_page);
$categoryList = $categoryDao->get($sql, null);
$title = 'Danh mục loại món ăn';
$user = $_SESSION['user'];
require('admin/view/category/index.php');
?>
<?php
if(isset($_GET['page'])) 
    	$page=intval($_GET['page']);
else 
    $page=1;
$page = ($page>0) ?$page:1;
$limit = 5;
$offset =  ($page-1)*$limit;

$sql;
$result = array();
$search = null;
if (isset($_POST['search'])) {
    $search = $_POST['search'];
}
if (isset($_GET['search'])) {
	$search = $_GET['search'];
}
// init FoodDao
$foodDao = $factory->getDao(utils\enum\DaoEnum::FOOD);
if ($search != null) {
    $sql = "select * from food where name like '%$keySearch%' LIMIT ".$offset.",".$limit;
    $result = $foodDao->get($sql, null);
    $url = "admin.php?controller=food&search=$search";
} else {
	$sql = "select * from food LIMIT ".$offset.",".$limit;
    $result = $foodDao->getAll();
    $url = "admin.php?controller=food";
}
$total_rows = count($result);
$total_page = ceil($total_rows/$limit);
$pagination = pagination($url, $page, $total_page);
$listFood = $foodDao->get($sql, null);
$title = 'Món ăn';
$user = $_SESSION['user'];

require('admin/view/food/index.php');
?>
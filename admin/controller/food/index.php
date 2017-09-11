<?php
if(isset($_GET['page'])) 
    $page=intval($_GET['page']);
else 
    $page=1;
$page = ($page>0) ?$page:1;
$limit = 5;
$offset =  ($page-1)*$limit;

if (isset($_POST['search'])) {
    $search = $_POST['search'];
}
if (isset($_GET['search'])) {
	$search = $_GET['search'];
}
// init FoodDao
$foodDao = $factory->getDao(utils\enum\DaoEnum::FOOD);
$url = "admin.php?controller=food";
$options = array();
if(isset($search)){
    $options['where'] = "name like '%$search%'";
    $url = "admin.php?controller=food&search=$search";
}

$result = $foodDao->getAll($options);

$total_rows = count($result);
$total_page = ceil($total_rows/$limit);
$pagination = utils\Help::pagination($url, $page, $total_page);
$options = array('limit' => $limit, 'offset' => $offset);
$foods = $foodDao->getAll($options);
$title = 'Món ăn';
$user = $_SESSION['user'];

require('admin/view/food/index.php');
?>
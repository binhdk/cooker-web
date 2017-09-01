<?php 

$search="";

if(isset($_POST['search']))
    $search=$_POST['search'];
if (isset($_GET['key']))
    $search = $_GET['key'];

// panigation
if (isset($_GET['page'])) 
    $page = intval($_GET['page']);
else 
    $page = 1;
$page = ($page > 0) ? $page : 1;
$limit = 6;
$offset = ($page - 1) * $limit;

$foodDao = $factory->getDao(utils\enum\DaoEnum::FOOD);
$result = $foodDao->get("select * from food  where name like '%$search%'", null);
$total_rows = count($result);
$total_page = ceil($total_rows / $limit);
$url = "index.php?view=search&key=$search";

$pagination = pagination($url, $page, $total_page);
$foods = $foodDao->get("select * from food  where name like '%$search%' LIMIT $offset, $limit", null);

// call view
require_once 'views/component/search.php';
?>
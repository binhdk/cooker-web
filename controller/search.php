<?php 

$search="";

if(isset($_GET['s']))
    $search=$_GET['s'];
if (isset($_GET['search']))
    $search = $_GET['search'];

// panigation
if (isset($_GET['page'])) 
    $page = intval($_GET['page']);
else 
    $page = 1;
$page = ($page > 0) ? $page : 1;
$limit = 6;
$offset = ($page - 1) * $limit;

$options = array(
    'where' => "name like '%$search%'"
);
$foodDao = $factory->getDao(utils\enum\DaoEnum::FOOD);
$result = $foodDao->getAll($options);
$total_rows = count($result);
$total_page = ceil($total_rows / $limit);
$url = "/search/?search=$search";
$pagination = utils\Help::pagination($url, $page, $total_page);
$options['offset'] = $offset;
$options['limit'] = $limit;
$foods = $foodDao->getAll($options);

// call view
require_once 'view/search.php';
?>
<?php
 // call dao
if(isset($_GET['id']))
    $id=$_GET['id'];
$foodDao = $factory->getDao(utils\enum\DaoEnum::FOOD);
$food = $foodDao->getFood(array('where' => "id=$id"));

require 'view/food-detail.php';
?>
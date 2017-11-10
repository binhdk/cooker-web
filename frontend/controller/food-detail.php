<?php
 // call dao
if(isset($_GET['id'])) {
    $id = intval(preg_replace("/\D/","",$_GET['id']));
    $foodDao = $factory->getDao(utils\enum\DaoEnum::FOOD);
    $food = $foodDao->getFood(array('where' => "id=$id"));
    if(!empty($food)) {
    	require 'frontend/view/food-detail.php';
    } else {
    	utils\Help::show_404();
    }
}else utils\Help::show_404();
?>
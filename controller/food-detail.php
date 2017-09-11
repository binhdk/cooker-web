<?php
 // call dao
if(isset($_GET['id'])) {
    $id = preg_replace("/\D/","",$_GET['id']);
    $foodDao = $factory->getDao(utils\enum\DaoEnum::FOOD);
    $food = $foodDao->getFood(array('where' => "id=$id"));
    if(!empty($food)) {
    	require 'view/food-detail.php';
    } else {
    	utils\Help::show_404();
    }
}
?>
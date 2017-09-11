<?php
 // call dao
if(isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $foodDao = $factory->getDao(utils\enum\DaoEnum::FOOD);
    $food = $foodDao->getFood(array('where' => "id=$id"));
    if(!empty($food)) {
    	require 'view/food-detail.php';
    } else {
    	utils\Help::show_404();
    }
}
?>
<?php
//load model
$id = intval($_GET['id']);

$foodDao = $factory->getDao(utils\enum\DaoEnum::FOOD);
$foodDao->delFood(array('id' => $id));
header('location:admin.php?controller=food');
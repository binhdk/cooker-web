<?php
//load model
$id = intval($_GET['id']);

$foodDao = $factory->getDao(utils\enum\EnumDao::FOOD);
$foodDao->delFood($id);
header('location:admin.php?controller=monan');
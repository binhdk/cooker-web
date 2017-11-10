<?php
$id = intval($_GET['id']);
$categoryDao = $factory->getDao(utils\enum\DaoEnum::CATEGORY);
$categoryDao->delCategory(array('where' => "id=$id"));
//load view
header('location:admin.php?controller=category');
?>
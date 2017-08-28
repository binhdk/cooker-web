<?php
$id = intval($_GET['id']);
$categoryDao = $factory->getDao(utils\enum\DaoEnum::CATEGORY);
$categoryDao->delCategory($id);
//load view
header('location:admin.php?controller=category');
?>
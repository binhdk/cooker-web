<?php
use dao\CategoryDaoImpl;
$id = intval($_GET['id']);
$categoryDao = dao\CategoryDaoImpl::getInstance();
$categoryDao->delCategory($id);
//load view
header('location:admin.php?controller=category');
?>
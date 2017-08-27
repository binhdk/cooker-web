<?php
//load model
use dao\CategoryDaoImpl;
use model\Category;

$categoryDao = dao\CategoryDaoImpl::getInstance();
if (!empty($_POST)) {
	$category = new model\Category;
	$category->__set($id, $_POST['name']);
	$category->__set($name, $_POST['id']);
	$category->__set($status, $_POST['status']);
	
	if($category->__get($id)) {
	  $categoryDao->editCategory($category);
	} else {
		$categoryDao->addCategory($category);
	    header('location:admin.php?controller=category');
	} 
} else {
	
}

if (isset($_GET['id'])) $id = intval($_GET['id']); else $id=0;

$title = ($id==0) ? 'Thêm loại' : 'Sửa loại';
$user = $_SESSION['user'];
$category = $categoryDao->getCategory($id);
//load view
require('admin/view/category/edit.php');
?>
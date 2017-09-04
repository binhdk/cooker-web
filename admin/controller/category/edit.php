<?php

// $factory = dao\AbstractDaoFactory::getDaoFactory(enum\FactoryEnum::MYSQL);
$categoryDao = $factory->getDao(utils\enum\DaoEnum::CATEGORY);
if (!empty($_POST)) {
	$category = array(
		    'id' => intval($_POST['id']),
            'name' => $_POST['name'],
            'status' => $_POST['status']
		);
	if ($category['id']) {
	    $isEdit = $categoryDao->editCategory($category);
	    if($isEdit == 1) {
		    echo "<script>window.alert(' Update success');";
            echo "window.location.href= 'admin.php?controller=category';";
		    echo "</script>";
		   
	    } else {
			echo "<script>window.alert(' Update fail, please do later');";
            echo "window.location.href= 'admin.php?controller=category';";
		    echo "</script>";

	    }
	} else {
		$isAdd = $categoryDao->addCategory($category);
		if($isAdd >0) {
		    echo "<script>window.alert(' Add success');";
            echo "window.location.href= 'admin.php?controller=food';";
		    echo "</script>";
		} else {
			echo "<script>window.alert(' add fail, please do later');";
            echo "window.location.href= 'admin.php?controller=food';";
		    echo "</script>";
		}
	}
	
}

if (isset($_GET['id'])) $id = intval($_GET['id']); else $id = 0;
$title = ($id == 0) ? 'Thêm loại' : 'Sửa loại';
$user = $_SESSION['user'];
$category = $categoryDao->getCategory(array('id' => $id)) != null ?
  $categoryDao->getCategory(array('id' => $id)) : null;
//load view
require('admin/view/category/edit.php');

?>
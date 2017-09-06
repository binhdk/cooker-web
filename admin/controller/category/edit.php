<?php

$categoryDao = $factory->getDao(utils\enum\DaoEnum::CATEGORY);
if (!empty($_POST)) {
	$id = intval($_POST['id']);
	$category = array(
		    'id' => $id,
            'name' => $_POST['name'],
            'status' => $_POST['status']
		);
	if ($id > 0) {
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
		if($isAdd > 0) {
		    echo "<script>window.alert(' Add success');";
            echo "window.location.href= 'admin.php?controller=category';";
		    echo "</script>";
		} else {
			echo "<script>window.alert(' add fail, please do later');";
            echo "window.location.href= 'admin.php?controller=category';";
		    echo "</script>";
		}
	}
	
}

if (isset($_GET['id'])) $id = intval($_GET['id']); else $id = 0;
$title = ($id == 0) ? 'Thêm loại' : 'Sửa loại';
$user = $_SESSION['user'];
$category = $categoryDao->getCategory(array('where' => "id=$id")) != null ?
$categoryDao->getCategory(array('where' => "id=$id")) : null;
//load view
require('admin/view/category/edit.php');

?>
<?php

$foodDao = $factory->getDao(utils\enum\DaoEnum::FOOD);
$categoryDao = $factory->getDao(utils\enum\DaoEnum::CATEGORY);

// nếu chọn sửa/thêm 
if (!empty($_POST)) {
	$name = ($_POST['name']);

	$food = array(
		    'name' => $name,
		    'category_id' => intval($_POST['category_id']),
            'component'=> $_POST['component'],
            'price' => doubleval(str_replace('.', '',$_POST['price'])),
            'detail'=> $_POST['detail'],
            'id' => intval($_POST['id'])
	);
    $id = intval($_POST['id']);
    if($id > 0) {
        $rowEdited = $foodDao->editFood($food);
        if($rowEdited > 0) {
            echo "<script>window.alert('Update success');";
            // echo "window.location.href='admin.php?controller=food';";
            echo "</script>";
               
        } else {
            echo "<script>window.alert(' Update fail, please do later');";
            // echo "window.location.href= 'admin.php?controller=food';";
            echo "</script>";
        }
    } else {
        $id = $foodDao->addFood($food);
        if($id > 0) {
            echo "<script>window.alert('Add success');";
            // echo "window.location.href='admin.php?controller=food';";
            echo "</script>";
        } else {
            echo "<script>window.alert(' add fail, please do later');";
            // echo "window.location.href= 'admin.php?controller=food';";
            echo "</script>";
        }
    } 

	//upload ảnh
    $imageName = $id . '-' . alias($name);
    $config = array(
        'name' => $imageName,
        'upload_path'  => 'assets/updoads/',
        'allowed_exts' => 'jpg|jpeg|png|gif'
    );

    $image = upload('image', $config);
    
    // cập nhật ảnh mới
    if($image){
    	$food = array(
    		'image' => $image,
            'id' => $id
    	);
    	$foodDao->editFood($food);
    }
	// header('location:admin.php?controller=food');
}

if (isset($_GET['id'])) $id = intval($_GET['id']); else $id = 0;
$title = ($id == 0) ? 'Thêm món ăn' : 'Sửa món ăn';
$user = $_SESSION['user'];
$food = $foodDao->getFood(array('where' => "id=$id")) != null ? 
        $foodDao->getFood(array('where' => "id=$id")) : null;
$categories = $categoryDao->getCategories(array('where' => "status=1"));
//load view
require('admin/view/food/edit.php');
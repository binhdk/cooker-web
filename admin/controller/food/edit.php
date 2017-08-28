<?php
// nếu chọn sửa/thêm 
if (!empty($_POST)) {
	  $name = ($_POST['name']);

	  $food = array(
		    'name' => $tenmonan,
		    'categoryDao' => intval($_POST['category_id']),
        'component'=>($_POST['component']),
        'price' => doubleval(str_replace('.', '',$_POST['price'])),
        'detail'=>$_POST['detail'],
		    'id' => intval($_POST['id'])
	  );
        if($food['id']){
            $isEdit = $foodDao->editFood($food);
            if($isEdit == 1) {
                echo "<script>window.alert(' Update success');";
                echo "window.location.href= 'admin.php?controller=food';";
                echo "</script>";
                   
            } else {
                echo "<script>window.alert(' Update fail, please do later');";
                echo "window.location.href= 'admin.php?controller=food';";
                echo "</script>";
            }
        } else {
            $id = $foodDao->addFood($food);
            if($id == 1) {
                echo "<script>window.alert(' Add success');";
                echo "window.location.href= 'admin.php?controller=category';";
                echo "</script>";
            } else {
                echo "<script>window.alert(' add fail, please do later');";
                echo "window.location.href= 'admin.php?controller=category';";
                echo "</script>";
            }
        } 

	//upload ảnh
    $image=alias($name);
    $config = array(
        'name' => $image,
        'upload_path'  => 'assets/updoads/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
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
	header('location:admin.php?controller=food');
}

$foodDao = $factory->getDao(utils\enum\DaoEnum::FOOD);
$categoryDao = $factory->getDao(utils\enum\DaoEnum::CATEGORY);
if (isset($_GET['id'])) $id = intval($_GET['id']); else $id = 0;
$title = ($id == 0) ? 'Thêm món ăn' : 'Sửa món ăn';
$user = $_SESSION['user'];
$food = $foodDao->getFood($id) != null ? $foodDao->getFood($id)[0] : null;
$category = $categoryDao->getAll();
//load view
require('admin/view/food/edit.php');
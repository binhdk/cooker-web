<?php 
header('Content-type: application/json; charset=utf-8');
require_once '../dao/BaseDao.class.php';
	$sql="select * from category";
	$result=BaseDao::selectall($sql);
	echo json_encode($result);
 ?>
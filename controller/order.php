<?php

if(isset($_SESSION['customer']))
    $customer_id=$_SESSION['customer']['id'];
$dao = $factory->getDao(utils\enum\DaoEnum::ORDER);
$options = array(
	'select' => "id",
    'where' => "customer_id=$customer_id"
);

$orderIds = $dao->getOrders($options);
$orders = array();
$sql = "SELECT food.id, name, image, price, quantity 
			FROM order_detail
			INNER JOIN food ON food.id=order_detail.food_id
			WHERE order_detail.order_id=?";
foreach ($orderIds as $orderId) {
	$order[] = $dao->getBySQL($sql, array($orderId->id));
}
require 'view/order.php';
?>
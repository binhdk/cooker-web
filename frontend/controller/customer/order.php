<?php

if(empty($_SESSION['customer'])) {
    header('location:.');
} else {
    $customer_id = intval($_SESSION['customer']['id']);
    $dao = $factory->getDao(utils\enum\DaoEnum::ORDER);
    $options = array(
    	'select' => "id, price",
        'where' => "customer_id=$customer_id"
    );

    $orderIds = $dao->getOrders($options);
    $order_details = array();
    $sql = "SELECT food.id, name, image, price, quantity 
    			FROM order_detail
    			INNER JOIN food ON food.id=order_detail.food_id
    			WHERE order_detail.order_id=?";
    foreach ($orderIds as $orderId) {
    	$order_details[$orderId->id] = $dao->getBySQL($sql, array($orderId->id));
    }
    require 'frontend/view/customer/order.php';
}
?>
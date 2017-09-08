<?php
$orderDao = $factory->getDao(utils\enum\DaoEnum::ORDER);
$foodDao = $factory->getDao(utils\enum\DaoEnum::FOOD);
$orderDetailDao = $factory->getDao(utils\enum\DaoEnum::ORDER_DETAIL);

if(!isset($_SESSION['cart'])) $_SESSION['cart'] = array();
if(isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'buy':
            if (!isset($_SESSION['customer'])) {
                echo "<script>window.alert('Vui lòng đăng nhập để mua hàng');";
                echo "window.location.href ='.?view=cart';</script>";
            } else {
                saveOrder();
            }
            break;
        case 'delete':
            unset($_SESSION['cart'][$_GET['id']]);
            header('location:.?view=cart');
            break;
    }
} else {
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        addItem($id);
    }
  // call view
  require_once 'view/cart.php';
}

function addItem($id)
{
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $food =  $GLOBALS['foodDao']->getFood(array('where' => "id=$id"));
        $_SESSION['cart'][$id] = array(
            'id' => $id,
            'name' => $food->name,
            'image' => $food->image,
            'quantity' => 1,
            'price' => doubleval($food->price)
       );
    }
    header('location:.?view=cart');
}

function saveOrder()
{
    $cart = getCart();
    if (!empty($_POST) && !empty($cart)) {
        $order = array(
            'customer_id' => $_SESSION['customer']['id'],
            'created' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
            'price' => total(),
            'status' => 0
        );
        $order_id = $GLOBALS['orderDao']->addOrder($order);
        
        if($order_id > 0) {
            foreach ($cart as $food) {
                $order_detail = array(
                    'order_id' => $order_id,
                    'food_id' => intval($food['id']),
                    'quantity' => intval($food['quantity'])
                );
                // save into database
                $GLOBALS['orderDetailDao']->addOrderDetail($order_detail);
                // set emtpy cart
                $_SESSION['cart'] = array();
            }
            echo "<script>alert('Đặt hàng thành công');</script>";
            echo "<script>window.location.href='.';</script>";
        } else {
            echo "<script>alert('Có lỗi xảy ra vui lòng đợi trong giây lát, chúng tôi đang kiểm tra!');</script>";
            echo "<script>window.location.href='.?view=cart';</script>";
        }     
    } else {
        echo "<script>alert('Bạn chưa có sản phẩm nào trong giỏ hàng');</script>";
        echo "<script>window.location.href='.?view=cart';</script>";
    } 
}

function updateCart($id, $quantity){
    if($quantity == 0){
        unset($_SESSION['cart'][$id]);
    } else {
        $_SESSION['cart'][$id]['quantity'] = $quantity;
    }
}

function total(){
    $total = 0;
    foreach($_SESSION['cart'] as $food){
        $total += $food['price'] * $food['quantity'];
    }
    return $total;
}

function quantity_order(){
    $quantity = 0;
    foreach($_SESSION['cart'] as $food){
      $quantity += $food['quantity'];
    }
    return $quantity;
}

function getCart(){
    return $_SESSION['cart'];
}
?>
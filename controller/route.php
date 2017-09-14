<?php 
if (!isset($_GET['mod'])) {
    require('controller/main-content.php');
} else if (!empty($_GET['mod'])) {
    $mod = $_GET['mod'];
    switch($mod) {
        case 'home':
            require 'controller/main-content.php';
            break;
        case 'search':
            require 'controller/search.php';
            break;
        case 'register':
            require 'controller/customer/register.php';
            break;
        case 'logout':
            require 'controller/customer/logout.php';
            break;
        case 'food-category-detail':
            require 'controller/food-category-detail.php';
            break;
        case 'food-detail':
            require 'controller/food-detail.php';
            break;
        case 'suggest-food':
            require 'controller/suggest-food.php';
            break;
        case 'cart':
            require 'controller/customer/cart.php';
            break;
        case 'health-news':
            require 'controller/health-news.php';
            break;
        case 'order':
            require 'controller/customer/order.php';
            break;
        default :
            utils\Help::show_404();
            break;
    }
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $is_logged = (new model\CustomerModel)->login($email, $password);
    if($is_logged === true) 
       header('location:/cooker');
    else 
      echo "<script>alert('Wrong email or password');</script>";
}
?>
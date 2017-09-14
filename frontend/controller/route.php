<?php 
if (empty($_GET['mod'])|| !isset($_GET['mod'])) {
    require 'frontend/controller/main-content.php';
} else if (!empty($_GET['mod'])) {
    $mod = $_GET['mod'];
    switch($mod) {
        case 'home':
            require 'frontend/controller/main-content.php';
            break;
        case 'search':
            require 'frontend/controller/search.php';
            break;
        case 'register':
            require 'frontend/controller/customer/register.php';
            break;
        case 'logout':
            require 'frontend/controller/customer/logout.php';
            break;
        case 'food-category-detail':
            require 'frontend/controller/food-category-detail.php';
            break;
        case 'food-detail':
            require 'frontend/controller/food-detail.php';
            break;
        case 'suggest-food':
            require 'frontend/controller/suggest-food.php';
            break;
        case 'cart':
            require 'frontend/controller/customer/cart.php';
            break;
        case 'health-news':
            require 'frontend/controller/health-news.php';
            break;
        case 'order':
            require 'frontend/controller/customer/order.php';
            break;
        default :
            utils\Help::show_404();
            break;
    }
}
?>
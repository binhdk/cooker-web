<?php 
if (!isset($_GET['view'])) {
    require('controller/main-content.php');
}
if (isset($_GET['view'])) {
    $view = $_GET['view'];
    switch($view) {
        case 'home':
            require('controller/main-content.php');
            break;
        case 'register':
            require_once('controller/register.php');
            break;
        case 'search':
            require_once('controller/search.php');
            break;
        case 'logout':
            (new controller\CustomerController)->logout();
            break;
        case 'food-detail':
            require_once('controller/food-detail.php');
            break;
        case 'food-category-detail':
            require_once('controller/food-category-detail.php');
            break;
        case 'suggest-food':
            require_once('controller/suggest-food.php');
            break;
        case 'cart':
            require_once('controller/cart.php');
            break;
        case 'health-news':
            require_once 'controller/health-news.php';
            break;
        case 'order':
            require_once 'controller/order.php';
            break;
        default :
            utils\Help::show_404();
    }
}
?>
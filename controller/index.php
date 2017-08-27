<?php 
if(!isset($_GET['mod']))
 {
   include('controller/main-content.php');
 }
 if(isset($_GET['mod'])){
  $action=$_GET['mod'];
  switch($action){
    case 'home': include('controller/main-content.php');break;
    case 'register': include_once('controller/register.php');break;
    case 'search': include_once('controller/search.php');break;
    case 'logout':{
      unset($_SESSION['user']);
      unset($_SESSION['giohang']);
      header("location:index.php");
      break;
     }
    case 'food-detail':include_once('view/food-detail.php');break;
    case 'food-category-detail':include_once('controller/food-category-detail.php');break;
    case 'suggest-food':include_once('view/suggest-food.php');break;
    case 'cart':include_once('controller/cart.php');break;
    case 'health-news':include_once 'view/health-news.php';break;
    case 'order':include_once 'controller/order.php';break;
  }
  }

?>
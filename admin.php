<?php
session_start();
require_once 'config.php';
require_once 'utils\function.php';
require_once 'utils/upload_image.php';
require_once 'AutoLoad.php';
new AutoLoad;
use dao as dao;
use model as model;
use utils\enum as enum;
use dao\AbstractDaoFactory as Factory;

$factory = Factory::getDaoFactory(enum\FactoryEnum::MYSQL);
if(isset($_GET['controller']))
    $controller = $_GET['controller'];
else 
	$controller = 'home';

if(isset($_GET['action']))
    $action = $_GET['action'];
else 
    $action = 'index';

if(!isset($_SESSION['user'])) {
    $controller = 'home';
    $action = 'login';
}

$file = 'admin/controller/'.$controller.'/'.$action.'.php';
if (file_exists($file)) {
    require($file);
} else {
    echo "error";
}
?>
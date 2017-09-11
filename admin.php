<?php
session_start();
error_reporting(E_ALL & ~(E_NOTICE & E_WARNING));
require_once 'config.php';
require_once 'AutoLoad.php';

use dao as dao;
use model as model;
use utils\enum\FactoryEnum as FactoryEnum;
use utils\enum\DaoEnum as DaoEnum;

use dao\AbstractDaoFactory as Factory;

new AutoLoad;

$factory = Factory::getDaoFactory(FactoryEnum::MYSQL);

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
   utils\Help::show_404();
}
?>
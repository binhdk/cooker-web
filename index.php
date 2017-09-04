<?php
require_once 'config.php';
require_once 'utils/pagination.php';
require_once 'utils/upload_image.php';
require_once 'AutoLoad.php';
ob_start();
session_start();

use controller as controller;
use dao as dao;
use model as model;
use utils\enum\FactoryEnum as FactoryEnum;
use utils\enum\DaoEnum as DaoEnum;
use dao\AbstractDaoFactory as Factory;

new AutoLoad;
$factory = Factory::getDaoFactory(FactoryEnum::MYSQL);

require_once 'view/index.php';

?>
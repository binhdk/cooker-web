<?php
require_once 'utils/config.php';
require_once 'utils/AutoLoad.php';
ob_start();
session_start();

use controller as controller;
use dao as dao;
use model as model;
use utils\enum\FactoryEnum as FactoryEnum;
use utils\enum\DaoEnum as DaoEnum;
use utils\Help as Help;
use dao\AbstractDaoFactory as Factory;

new utils\AutoLoad;
$factory = Factory::getDaoFactory(FactoryEnum::MYSQL);

require_once 'view/index.php';

?>
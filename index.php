<?php
require_once __DIR__ . '/utils/config.php';
require_once __DIR__ . '/utils/AutoLoad.php';
ob_start();
session_start();

use dao as dao;
use utils\enum\FactoryEnum as FactoryEnum;
use utils\enum\DaoEnum as DaoEnum;
use utils\Help as Help;
use dao\AbstractDaoFactory as Factory;

new utils\AutoLoad;
$factory = Factory::getDaoFactory(FactoryEnum::MYSQL);

require_once 'frontend/view/index.php';


?>

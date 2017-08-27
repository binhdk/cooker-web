<?php
//load model
require_once('dao/MoAnDao.class.php');

$id = intval($_GET['id']);
MonAnDao::xoaMonAn($id);

header('location:admin.php?controller=monan');
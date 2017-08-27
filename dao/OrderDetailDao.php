<?php
namespace dao;
interface OrderDetailDao extends BaseDao
{
    public function getAll();
    public function getOrderDetail($id);
    public function addOrderDetail($orderDetail);
    public function delOrderDetail($id);
    public function editOrderDetail($orderDetail);
} 
?>
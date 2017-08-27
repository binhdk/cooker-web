<?php
namespace dao;
interface OrderDao extends BaseDao
{
    public function getOrder($id);
    public function getAll();
    public function addOrder($order);
    public function editOrder($order);
    public function delOrder($id);
} 
?>

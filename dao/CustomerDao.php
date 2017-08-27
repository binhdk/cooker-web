<?php
namespace dao;
interface CustomerDao extends BaseDao
{
    public function getCustomer($id);
    public function getAll();
    public function addCustomer($customer);
    public function editCustomer($customer);
    public function delCustomer($id);
} 
?>
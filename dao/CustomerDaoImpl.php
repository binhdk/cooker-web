<?php
namespace dao;
use utils\enum\TableEnum as Table;
class CustomerDaoImpl extends BaseDaoImpl
{
    public function __construct($conn)
    {
        parent::__construct($conn);
    }

    public function getCustomer($options = array())
    {
        $customers = $this->get(Table::CUSTOMER, $options);
        return reset($customers);
    }

    public function getAll($options = array())
    {
        $customers = $this->get(Table::CUSTOMER, $options);
        return $customers;
    }

    public function addCustomer($customer = array())
    {
        $isAdd = $this->add(Table::CUSTOMER, $customer);
        return $isAdd;
    }

    public function editCustomer($customer = array())
    {
        $isEdit = $this->edit(Table::CUSTOMER, $customer);
        return $isEdit;
    }

    public function delCustomer($where = array())
    {
    	$isDelete = $this->del(Table::CUSTOMER, $where);
        return $isDelete;
    }
} 
?>
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
        return reset($customers) === false ? null : reset($customers);
    }

    public function getAll($options = array())
    {
        $customers = $this->get(Table::CUSTOMER, $options);
        return $customers;
    }

    public function addCustomer($customer = array())
    {
        $rowAdd = $this->add(Table::CUSTOMER, $customer);
        return $rowAdd;
    }

    public function editCustomer($customer = array())
    {
        $rowEdit = $this->edit(Table::CUSTOMER, $customer);
        return $rowEdit;
    }

    public function delCustomer($where = array())
    {
    	$rowDel = $this->del(Table::CUSTOMER, $where);
        return $rowDel;
    }
} 
?>
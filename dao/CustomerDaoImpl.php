<?php
namespace dao;
class CustomerDaoImpl extends BaseDaoImpl implements CustomerDao
{
    public function __construct($conn)
    {
        parent::__construct($conn);
    }

    public function getCustomer($id)
    {
        $customer = $this->get("select * from customer where id=?", $id);
        return $customer;
    }

    public function getAll()
    {
        $list = $this->get("select * from customer", null);
        return $list;
    }

    public function addCustomer($customer)
    {
        $sql = "insert into customer values(?,?)";
        $isAdd = $this->add($sql, $customer);
        return $isAdd;
    }

    public function editCustomer($customer)
    {
        $sql = "update customer set name=? where id=?";
        $isEdit = $this->edit($sql, $customer);
        return $isEdit;
    }

    public function delCustomer($id)
    {
    	$isDelete = $this->del("delete from customer where is=?", $id);
        return $isDelete;
    }
} 
?>
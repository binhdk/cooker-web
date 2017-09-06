<?php
namespace dao;
use utils\enum\TableEnum as Table;
class OrderDetailDaoImpl extends BaseDaoImpl
{
    public function __construct($conn)
    {
        parent::__construct($conn);
    }

    public function getAll($options = array())
    {
        $orderDetails = $this->get(Table::ORDER_DETAIL, $options);
        return $orderDetails;
    }

    public function getOrderDetail($options = array())
    {
        $orderDetails = $this->get(Table::ORDER_DETAIL, $options);
         return reset($orderDetails) === false ? null : reset($orderDetails);
    }

    public function addOrderDetail($orderDetail = array())
    {
        $isAdd = $this->add(Table::ORDER_DETAIL, $orderDetail);
        return $isAdd;
    }

    public function delOrderDetail($where = array())
    {
        $isDelete = $this->del(Table::ORDER_DETAIL, $where);
        return $isDelete;
    }

    public function editOrderDetail($orderDetail = array())
    {
        $isEdit = $this->edit(Table::ORDER_DETAIL, $orderDetail);
        return $isEdit;
    }
} 
?>
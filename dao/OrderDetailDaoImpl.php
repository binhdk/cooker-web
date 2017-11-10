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
        return $this->get(Table::ORDER_DETAIL, $options);
    }

    public function getOrderDetail($options = array())
    {
        $orderDetails = $this->get(Table::ORDER_DETAIL, $options);
        return reset($orderDetails) === false ? null : reset($orderDetails);
    }

    public function addOrderDetail($orderDetail = array())
    {
        return $this->add(Table::ORDER_DETAIL, $orderDetail);
    }

    public function delOrderDetail($where = array())
    {
        return $this->del(Table::ORDER_DETAIL, $where);
    }

    public function editOrderDetail($orderDetail = array())
    {
        return $this->edit(Table::ORDER_DETAIL, $orderDetail);
    }
} 
?>
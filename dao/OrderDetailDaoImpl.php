<?php
namespace dao;
class OrderDetailDaoImpl extends BaseDaoImpl
{
    public function __construct($conn)
    {
        parent::__construct($conn);
    }

    public function getAll()
    {
        $list = $this->get("select * from order_detail",null);
        return $list;
    }

    public function getOrderDetail($id)
    {
        $orderDetail = $this->get("select * from order_detail where id=?", $id);
        return $orderDetail;
    }

    public function addOrderDetail($orderDetail)
    {
        $sql = "insert into order_detail values(?,?)";
        $isAdd = $this->add($sql, $orderDetail);
        return $isAdd;
    }

    public function delOrderDetail($id)
    {
        $isDelete = $this->del("delete from order_detail where id=?", $id);
        return $isDelete;
    }

    public function editOrderDetail($orderDetail)
    {
        $sql = "update order_detail set name=? where id=?";
        $isEdit = $this->edit($sql, $orderDetail);
        return $isEdit;
    }
} 
?>
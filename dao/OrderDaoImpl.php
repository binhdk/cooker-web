<?php 
namespace dao;
 class OrderDaoImpl extends BaseDaoImpl implements OrderDao
 {

 	public function getOrder($id)
 	{
        $order = $this->get("select * from orders where id=?", $id);
        return $order;     
 	}

    public function getAll()
    {
        $list = $this->get("select * from orders", null);
        return $list;
    }

    public function addOrder($order)
    {
        $sql = "insert into orders values(?,?)";
        $isAdd = $this->add($sql, $order);
        return $isAdd;
    }

    public function editOrder($order)
    {
        $sql = "update orders set name=? where id=?";
        $isEdit = $this->edit($sql, $order);
        return $isEdit;
    }

    public function delOrder($id)
    {
    	$isDelete = $this->del("delete from orders where id=?", $id);
        return $isDelete;
    }
 }
 ?>
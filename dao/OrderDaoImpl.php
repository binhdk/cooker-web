<?php 
namespace dao;
use utils\enum\TableEnum as Table;
 class OrderDaoImpl extends BaseDaoImpl
 {
    public function __construct($conn)
    {
        parent::__construct($conn);
    }
    
 	public function getOrder($options = array())
 	{
        $orders = $this->get(Table::ORDER,  $options);
        return reset($orders);     
 	}

    public function getAll($options = array())
    {
        $orders = $this->get(Table::ORDER, $options);
        return $orders;
    }

    public function addOrder($order = array())
    {
        $isAdd = $this->add(Table::ORDER, $order);
        return $isAdd;
    }

    public function editOrder($order = array())
    {
        $isEdit = $this->edit(Table::ORDER, $order);
        return $isEdit;
    }

    public function delOrder($where = array())
    {
    	$isDelete = $this->del(Table::ORDER, $where);
        return $isDelete;
    }
 }
 ?>
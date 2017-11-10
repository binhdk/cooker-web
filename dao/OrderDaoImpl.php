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

    public function getOrders($options = array())
    {
        return $this->get(Table::ORDER, $options);
    }

    public function addOrder($order = array())
    {
        return $this->add(Table::ORDER, $order);
    }

    public function editOrder($order = array())
    {
        return $this->edit(Table::ORDER, $order);
    }

    public function delOrder($where = array())
    {
    	return $this->del(Table::ORDER, $where);
    }
 }
 ?>
<?php 
namespace dao;
use utils\enum\TableEnum as Table;
class FoodDaoImpl extends BaseDaoImpl
{
    public function __construct($conn)
    {
        parent::__construct($conn);
    }
    
	public function getFood($options = array())
    {
        $foods = $this->get(Table::FOOD, $options);
        return reset($foods);
	}

    public function getAll($options = array())
    {
        $foods = $this->get(Table::FOOD, $options);
        return $foods;
    }

    public function addFood($food = array())
    {
        $isAdd = $this->add(Table::FOOD, $food);
        return $isAdd;
    }

    public function editFood($food = array(), $options = array())
    {
        $rowEdited = $this->edit(Table::FOOD, $food, $options);
        return $rowEdited;
    }

    public function delFood($where = array())
    {
    	$isDelete = $this->del(Table::FOOD, $where);
        return $isDelete;
    }

 }
?>

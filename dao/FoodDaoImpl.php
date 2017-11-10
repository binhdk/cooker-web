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
        return reset($foods) === false ? null : reset($foods);
    }

    public function getAll($options = array())
    {
        return $this->get(Table::FOOD, $options);
        
    }

    public function addFood($food = array())
    {
       return $this->add(Table::FOOD, $food);
    }

    public function editFood($food = array(), $options = array())
    {
        return $this->edit(Table::FOOD, $food, $options);
    }

    public function delFood($where = array())
    {
    	return $this->del(Table::FOOD, $where);
    }
 }
?>

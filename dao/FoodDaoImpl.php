<?php 
namespace dao;
class FoodDaoImpl extends BaseDaoImpl implements FoodDao
{
    public function __construct($conn)
    {
        parent::__construct($conn);
    }
    
	public function getFood($id)
    {
        $list = $this->get("select * from food where id=?", array($id));
        return $this->resultSetToModel($list, 'model\Food');
	}

    public function getAll()
    {
        $list = $this->get("select * from food", null);
        return $this->resultSetToModel($list, 'model\Food');
    }

    public function addFood($food)
    {
        $sql = "insert into food values(?,?)";
        $isAdd = $this->add($sql, $food);
        return $isAdd;
    }

    public function editFood($food)
    {
        $sql = "update food set name=?, category_id=?, price=?, component=?, image=?, detail=? where id=?";
        $isEdit = $this->edit($sql,
                            array(
                                $food->__get('name'),
                                $food->__get('category_id'),
                                $food->__get('price'),
                                $food->__get('component'),
                                $food->__get('image'),
                                $food->__get('detail'),
                                $food->__get('id')
                            ));
        return $isEdit;
    }

    public function delFood($id)
    {
    	$isDelete = $this->del("delete from food where id=?", array($id));
        return $isDelete;
    }

 }
?>

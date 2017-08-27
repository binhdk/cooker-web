<?php 
namespace dao;
class FoodDaoImpl extends BaseDaoImpl implements FoodDao
{

	public function getFood($id)
    {
        $food = $this->get("select * from food where id=?", $id);
        return $food;
	}

    public function getAll()
    {
        $list = $this->get("select * from food", null);
        return $list;
    }

    public function addFood($food)
    {
        $sql = "insert into food values(?,?)";
        $isAdd = $this->add($sql, $food);
        return $isAdd;
    }

    public function editFood($food)
    {
        $sql = "update food set name=? where id=?";
        $isEdit = $this->edit($sql, $food);
        return $isEdit;
    }

    public function delFood($id)
    {
    	$isDelete = $this->del("delete from food where id=?", $id);
        return $isDelete;
    }

 }
?>

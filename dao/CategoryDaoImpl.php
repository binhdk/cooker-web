<?php 
namespace dao;
use model;
class CategoryDaoImpl extends BaseDaoImpl implements CategoryDao
{

    public function __construct($conn)
    {
        parent::__construct($conn);
    }

    public function getAll()
    {
        $list = $this->get("select * from category", null);
        return $this->resultSetToModel($list, 'model\Category');
    }

    public function getCategory($id)
    {
        $category = $this->get("select * from category where id=?", $id);
        return $this->resultSetToModel($category, 'model\Category');
    }

    public function delCategory($id)
    {
        $isDelete = $this->del("delete from category where id=?", $id);
        return $isDelete;
    }

    public function editCategory($category)
    {
        $sql = "update category set name=? where id=?";
        $isEdit = $this->edit($sql, $category);
        return $isEdit;
    }

    public function addCategory($category)
    {
        $sql = "insert into category values(?,?)";
        $isAdd = $this->add($sql, $category);
        return $isAdd;
    }
}
 ?>
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
        $category = $this->get("select * from category where id=?", array($id));
        return $this->resultSetToModel($category, 'model\Category');
    }

    public function delCategory($id)
    {
        $isDelete = $this->del("delete from category where id=?", array($id));
        return $isDelete;
    }

    public function editCategory($category)
    {
        $sql = "update category set name=?, status=? where id=?";
        $isEdit = $this->edit($sql, array($category->name, $category->status, $category->id));
        return $isEdit;
    }

    public function addCategory($category)
    {
        $sql = "insert into category (name,status) values(?,?)";
        $isAdd = $this->add($sql,
                array(
                    $category->__get('name'),
                    $category->__get('status')
                ));
        return $isAdd;
    }
}
?>
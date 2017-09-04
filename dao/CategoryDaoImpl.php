<?php 
namespace dao;
use utils\enum\TableEnum as Table;
class CategoryDaoImpl extends BaseDaoImpl
{
    public function __construct($conn)
    {
        parent::__construct($conn);
    }

    public function getCategories($options = array())
    {
        $categories = $this->get(Table::CATEGORY, $options);
        return $categories;
    }

    public function getCategory($options = array())
    {
        $categories = $this->get(Table::CATEGORY, $options);
        return reset($categories);
    }

    public function delCategory($options = array())
    {
        $rowDeleted = $this->del(Table::CATEGORY, $options);
        return $rowDeleted;
    }

    public function editCategory($category = array())
    {
        $rowEdited = $this->edit(Table::CATEGORY, $category);
        return $rowEdited;
    }

    public function addCategory($category = array())
    {
        $isAdded = $this->add($sql, $category);
        return $isAdded;
    }
}
?>
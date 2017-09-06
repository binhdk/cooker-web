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
        $rowDeleted = $this->edit(Table::CATEGORY, array('status' => 0), $options);
        return $rowDeleted;
    }

    public function editCategory($category = array(), $options = array())
    {
        $rowEdited = $this->edit(Table::CATEGORY, $category, $options);
        return $rowEdited;
    }

    public function addCategory($category = array())
    {
        $rowAdded = $this->add(Table::CATEGORY, $category);
        return $rowAdded;
    }
}
?>
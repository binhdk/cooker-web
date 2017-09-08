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
        return $this->get(Table::CATEGORY, $options);
    }

    public function getCategory($options = array())
    {
        $categories = $this->get(Table::CATEGORY, $options);
        return reset($categories) === false ? null : reset($categories);
    }

    public function delCategory($options = array())
    {
        return $this->edit(Table::CATEGORY, array('status' => 0), $options);
    }

    public function editCategory($category = array(), $options = array())
    {
        return $this->edit(Table::CATEGORY, $category, $options);
    }

    public function addCategory($category = array())
    {
        return $this->add(Table::CATEGORY, $category);
    }
}
?>
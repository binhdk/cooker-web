<?php
namespace dao;
interface CategoryDao extends BaseDao
{
    public function getAll();
    public function getCategory($id);
    public function addCategory($category);
    public function delCategory($id);
    public function editCategory($category);
} 
?>

<?php
namespace dao;
interface FoodDao extends BaseDao 
{
    public function getFood($id);
    public function getAll();
    public function addFood($food);
    public function editFood($food);
    public function delFood($id);
}
?>
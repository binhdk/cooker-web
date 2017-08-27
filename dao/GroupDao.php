<?php 
namespace dao;
interface GroupDao extends BaseDao
{
	public function getGroup($id);
	public function getAll();
    public function addGroup($group);
    public function editGroup($group);
    public function delGroup($id);
}
?>
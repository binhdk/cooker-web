<?php
namespace dao;
interface UserDao extends BaseDao
{
    public function getUser($id);
    public function addUser($user);
    public function editUser($user);
    public function delUser($id);
}
 ?>
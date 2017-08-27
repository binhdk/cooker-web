<?php 
namespace dao;
require_once 'AutoLoad.php';
class UserDaoImpl extends BaseDaoImpl implements UserDao
{
    public function __construct($conn)
    {
        parent::__construct($conn);
    }

    public function getUser($id)
    {
        $user = $this->get("select * from user where id=", $id);
        return $user;
    }

    public function getUserWithEmail($email)
    {
        $user = $this->get("select * from user where email=?", $email);
        return $this->resultSetToModel($user, 'model\User');
    }

    public function getAll()
    {
        $list = $this->get("select * from user", null);
        return $list;
    }

    public function editUser($user)
    {
    	$sql = "update user set ";
        $this->edit($sql, get_object_vars($user));
    }

    public function addUser($user){
    	$sql = "insert into user value(?,?,?,?,?,?,?,?,?,?)";
        return $this->add($sql, get_object_vars($user));
    }

    public function delUser($id){
        $this->del("delete from user where id=?", $id);
    }
}

?>
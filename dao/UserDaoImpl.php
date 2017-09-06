<?php 
namespace dao;
use utils\enum\TableEnum as Table;
class UserDaoImpl extends BaseDaoImpl
{
    public function __construct($conn)
    {
        parent::__construct($conn);
    }

    public function getUser($options)
    {
        $users = $this->get(Table::USER, $options);
        return reset($users) === false ? null : reset($users);
    }

    public function getAll($options)
    {
        $users = $this->get(Table::USER, $options);
        return $users;
    }

    public function editUser($user)
    {
        $users = $this->edit(Table::USER, $user);
        return reset($user);
    }

    public function addUser($user = array()){
        
        return $this->add(Table::USER, $user);
    }

    public function delUser($options = array()){
       return $this->del(Table::USER, $options);
    }
}

?>
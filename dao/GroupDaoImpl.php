<?php 
namespace dao;
class GroupDaoImpl implements GroupDao
{
    public function __construct($conn)
    {
        parent::__construct($conn);
    }
    
   	public function getGroup($id)
    {
        $group = $this->get("select * from groups where id=?", $id);
        return $group;
   	}
   	public function getAll()
    {
        $list = $this->get("select * from groups",null);
        return $list;
        
   	}

    public function addGroup($group)
    {
        $sql = "insert into groups values(?,?)";
        $isAdd = $this->add($sql, $group);
        return $isAdd;
    }

    public function editGroup($group)
    {
        $sql = "update groups set name=? where id=?";
        $isEdit = $this->edit($sql, $group);
        return $isEdit;
    }

    public function delGroup($id)
    {
        $isDelete = $this->del("delete from groups where id=?", $id);
        return $isDelete;
    }
}

?>
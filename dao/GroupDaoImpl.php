<?php 
namespace dao;
use utils\enum\TableEnum as Table;
class GroupDaoImpl extends BaseDaoImpl
{
    public function __construct($conn)
    {
        parent::__construct($conn);
    }
    
   	public function getGroup($options = array())
    {
        $groups = $this->get(Table::GROUP, $options);
        return reset($groups);
   	}
    
   	public function getAll($options = array())
    {
        $list = $this->get(Table::GROUP, $options );
        return $list;
        
   	}

    public function addGroup($group = array())
    {
        $isAdd = $this->add(Table::GROUP, $group);
        return $isAdd;
    }

    public function editGroup($group = array())
    {
        $isEdit = $this->edit(Table::GROUP, $group);
        return $isEdit;
    }

    public function delGroup($where = array())
    {
        $isDelete = $this->del(Table::GROUP, $where);
        return $isDelete;
    }
}

?>
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
        return $this->get(Table::GROUP, $options );  
   	}

    public function addGroup($group = array())
    {
        return $this->add(Table::GROUP, $group);
    }

    public function editGroup($group = array())
    {
        return $this->edit(Table::GROUP, $group);
    }

    public function delGroup($where = array())
    {
        return $this->del(Table::GROUP, $where);
    }
}

?>
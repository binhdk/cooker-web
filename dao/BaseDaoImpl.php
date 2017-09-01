<?php 
namespace dao;
use \PDO;
class BaseDaoImpl
{
  	private $conn;
    
  	public function __construct($conn)
    {
  		$this->conn = $conn;
  	}
    
  	public function get($sql, $param)
    {
        if($sql != null){
            try{
                $stat = $this->conn->prepare($sql);
                $stat->execute($param);
                return $stat->fetchAll(PDO::FETCH_OBJ);
                
            }catch(PDOException $e){
                die ("Cannot get\n");
            }
        }
  	}

 	public function add($sql, $param)
    {
        return $this->edit($sql, $param);
    }

    public function del($sql, $param)
    {
        return $this->edit($sql, $param);
    }

    public function edit($sql, $param)
    {
        if($sql != null) {
            try {
                $stat = $this->conn->prepare($sql);
                $stat->execute($param);
                return $stat->rowCount();
            } catch(PDOException $e) {
                die ("Cannot update\n");
                
            }
        }

    }

    public function resultSetToModel($resultSet, $model)
    {
        $list = array();
        $object = new $model();

        foreach ($resultSet as $rs) {
            foreach ($rs as $key => $value) {
                $object->__set($key, $value);
                array_push($list, $object);
            }
        }
        return $list;
    }
}
 ?>
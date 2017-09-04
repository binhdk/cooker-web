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
    
    public function edit($table, $data = array(), $options =array())
    {
        $keys = array();
        $values = array();
        foreach ($data as $key => $value) {
            $values[] = $value;
            $keys[] = "$key=?";
        }
        $where = isset($options['where']) ? ' where ' . $options['where'] : '';
        $sql = "update $table set " . implode(',', $keys) . $where;
        if($sql != null){
            try{
                $stat = $this->conn->prepare($sql);
                $stat->execute($values);
                return $stat->rowCount();
            }catch(PDOException $e){
                die ("Cannot update\n");
            }
        }
    }

    public function add($table, $data = array())
    {
        $keys = array();
        $params = array();
        $values = array();
        foreach ($data as $key => $value) {
            $params[] = $value;
            $keys .= '$key';
            $values[] = '?';
        }
        $sql = "insert into $table ("
             . implode(',', $keys) . ") values(" . implode(',', $values) . ")";
        try{
            $stat = $this->conn->prepare($sql);
            $stat->execute($params);
            return $stat->lastInsertId();  
        }catch(PDOException $e){
            die ("Cannot update\n");
        }  
    }

    public function del($table, $options = array())
    {
        $keys = array();
        $values = array();
        foreach ($options as $key => $value) {
            $values[] = $value;
            $keys[] = "$key=?";
        }
        $sql = "delete from $table where " . implode(',', $keys);
        try{
            $stat = $this->conn->prepare($sql);
            $stat->execute($values);
            return $stat->rowCount();  
        }catch(PDOException $e){
            die ("Cannot update\n");
        } 
    }

    public function get($table, $options = array(), $select = '*')
    {
        $select = isset($options['select']) ? $options['select'] : '*';
        $where = isset($options['where']) ? 'where ' . $options['where'] : '';
        $order_by = isset($options['order_by']) ? 'order by ' . $options['order_by'] : '';
        $limit = isset($options['offset']) && isset($options['limit']) ? 'limit ' . $options['offset'] . ',' . $options['limit'] : '';
        $sql = "select $select from $table $where $order_by $limit";
        try {
            $stat = $this->conn->prepare($sql);
            $stat->execute();
            return $stat->fetchAll(PDO::FETCH_OBJ);
        } catch(PDOException $e) {
            die ("Cannot get\n");
        }
    }
}
 ?>
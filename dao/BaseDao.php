<?php 
namespace dao;
interface BaseDao
{
 	public function get($sql, $param);
 	public function add($sql, $param);
 	public function del($sql, $param);
 	public function edit($sql, $param);
 	public function resultSetToModel($resultSet, $model);
}

?>
<?php
class Discipline implements Iterator {
private $_container=array();
protected $_position = 0;
	public function __construct(){
		$sql="select d.*,ifnull(x.test_ids,'') ids from discipline d left join (
			select id_dis,GROUP_CONCAT(distinct id_test order by id_test) test_ids from test group by id_dis) x
			on d.id_dis=x.id_dis ";
		$this->_container=Database::getInstance()->query($sql,array(),PDO::FETCH_ASSOC);
		
		$this->_position = 0;
	}
public function __destruct(){
	unset($this->_container);
}
	public function GetDiscipline() {
		return $this->_container;
	}
	public function rewind()
	{
		$this->_position = 0;
	}
	
	public function current()
	{
		return $this->_container[$this->_position];
	}
	
	public function key()
	{
		return $this->_position;
	}
	
	public function next()
	{
		++$this->_position;
	}
	
	public function valid()
	{
		return isset($this->_container[$this->_position]);
	}
}
?>
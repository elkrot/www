<?php
abstract class Table implements Iterator {
private $_container=array();
protected $_position = 0;
protected $sql;
	public function __construct($where="",$params=array(),$limit=""){
		$this->sql.=$where.$limit;
		$this->_container=Database::getInstance()->query($this->sql,$params,PDO::FETCH_ASSOC);
		$this->_position = 0;
	}
public function __destruct(){
	unset($this->_container);
}
	public function GetData() {
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
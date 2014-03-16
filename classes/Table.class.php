<?php
abstract class Table implements Iterator {
private $_container=array();
protected $_position = 0;
private $sql="select 1 ";
	public function __construct(){
		$this->_container=Database::getInstance()->query($this->sql,array(),PDO::FETCH_ASSOC);
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
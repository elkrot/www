<?php
class TestDataReader
{
	private $strategy;
	private $db;
	public function __construct ($strategy)
	{
		$this->strategy = $strategy;
	}
	public function __destruct()
	{
		unset($strategy);
	}
	function renderData()
	{
		var_dump($this->strategy->getData());
	}
	
	function saveTempData()
	{
		Logger::getInstance()->log(serialize($this->strategy->getData()));
		return $temp_id;
	}
	
	function saveData()
	{
		Logger::getInstance()->log("save");
	}
}
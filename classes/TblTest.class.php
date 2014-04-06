<?php
/**
 * Класс TblTest Класс тестов
 *
 *
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 */
 class TblTest extends Table {
	public function __construct($where="",$params=array(),$limit="",$order_by=" order by t.discipline_id"){
		$this->sql="select t . * , d.discipline_title FROM test t
LEFT JOIN discipline d ON d.id = t.discipline_id where 1=1 ";
		parent::__construct($where,$params,$limit,$order_by);
	}
	
	public function GetTestHierarchy()
	{
		$ret = array();
		
		foreach ($this as $value)
		{
			$ret[$value["discipline_title"]]["detail"][]=$value;
		}
	
		return $ret;
	}
}
?>
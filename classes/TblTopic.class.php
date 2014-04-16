<?php
/**
 * Класс TblTopic Класс Темы
 *
 *
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 */
 class TblTopic extends Table implements IHtmlHelpers{
	public function __construct($where="",$params=array(),$limit="",$order_by=" order by t.discipline_id"){
		$this->sql="select t . * , d.discipline_title FROM topic t 
				LEFT JOIN discipline d ON t.discipline_id = d.id where 1=1 ";
		parent::__construct($where,$params,$limit,$order_by);
	}
	
 	public static function getIdByTitle($title,$discipline_id)
	{
		$res = Database::getInstance()->query("select id from topic where topic_title=:title 
				and discipline_id=:discipline_id"
				,array(":title"=>$title, ":discipline_id"=>$discipline_id),PDO::FETCH_ASSOC);
		$id = count($res)==0?0:$res[0]["id"];

		if ($id==0){
			Database::getInstance()->query("insert into topic(topic_title,discipline_id) values(:title,:discipline_id)"
					,array(":title"=>$title, ":discipline_id"=>$discipline_id));
			$id=Database::getInstance()->lastInsertId();
		}
		return $id;
	}
	
	public function GetTopicHierarchy()
	{
		$ret = array();
		foreach ($this as $value) 
		{
			$ret[$value["discipline_title"]]["detail"][]=$value;
		}
		
		return $ret;
	}
	public static function GetDataForSelect($params=array(),$where=""){
		$res = Database::getInstance()->query("select id,topic_title from topic where 1=1 ".Database::GetParamStr($params)
				,$params,PDO::FETCH_ASSOC);
		$ret = array();
		foreach ($res as $itm){
			$ret[$itm["id"]]=$itm["topic_title"];
		}
		return $ret;
	}
}
?>
<?php
/**
 * Класс TblDiscipline Класс Дисциплины
 *
 *
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 */
 class TblDiscipline extends Table implements IHtmlHelpers {
	public function __construct($where="",$params=array(),$limit=""){
		$this->sql="select * from discipline where 1=1 ";
		parent::__construct($where,$params,$limit);
	}
	
	public static function getIdByTitle($title)
	{

		$res = Database::getInstance()->query("select id from discipline where discipline_title=:title"
				,array(":title"=>$title),PDO::FETCH_ASSOC);
		$id = count($res)==0?0:$res[0]["id"];
		//Logger::getInstance()->log(($id));		
		if ($id==0){
			Database::getInstance()->query("insert into discipline(discipline_title) values(:title)"
					,array(":title"=>$title));
			$id=Database::getInstance()->lastInsertId();
		}
		return $id;
	}
	public static function GetDataForSelect($params=array(),$where=""){
		$res = Database::getInstance()->query("select id,discipline_title from discipline  where 1=1 ".Database::GetParamStr($params)
				,$params,PDO::FETCH_ASSOC);
		$ret = array();
		foreach ($res as $itm){
			$ret[$itm["id"]]=$itm["discipline_title"];
		}
		return $ret;
	}
}
?>
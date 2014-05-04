<?php
/**
 * Класс TblTopic Класс Темы
 *
 *
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 * @package Tables
 * @category Models
 */

/**
 * Класс TblTopic Класс Темы
 *
 */
 class TblTopic extends Table implements IHtmlHelpers{
 	/**
 	 * Конструктор
 	 * 
 	 * @param string $where Условие отбора
 	 * @param array $params параметры условия отбора
 	 * @param string $limit Лимит данных
 	 * @param string $order_by Сортировка
 	 */
	public function __construct($where="",$params=array(),$limit="",$order_by=" order by t.discipline_id"){
		$this->sql="select t . * , d.discipline_title FROM topic t 
				LEFT JOIN discipline d ON t.discipline_id = d.id where 1=1 ";
		parent::__construct($where,$params,$limit,$order_by);
	}
	/**
	 * Определить значение ключа по наименованию
	 * 
	 * @param string $title Наименование темы
	 * @param number $discipline_id Ключ таблицы Дисциплины
	 * @return number
	 */
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
	/**
	 * Вернуть иерархию Тем в разрезе Дисциплины-Темы
	 */
	public function GetTopicHierarchy()
	{
		$ret = array();
		foreach ($this as $value) 
		{
			$ret[$value["discipline_title"]]["detail"][]=$value;
		}
		
		return $ret;
	}
	/**
	 * Вернуть данные для Html хелперов
	 * @param array $params Параметры условий отбора
	 * @param string $where Условие отбора
	 * @return array
	 */
	public static function GetDataForSelect($params=array(),$where=""){
		$res = Database::getInstance()->query("select id,topic_title from topic where 1=1 ".Database::GetParamStr($params)
				,$params,PDO::FETCH_ASSOC);
		$ret = array();
		foreach ($res as $itm){
			$ret[$itm["id"]]=$itm["topic_title"];
		}
		return $ret;
	}
  	/**
	 * Действие редактирования 
	 * 
	 * @param array $post Массив данных $_POST
	 * @return boolean
	 */
	public function edit($post=array()){

		Database::getInstance()->query("update topic set topic_title = :title
				 where id=:id"
				,array(":title"=>$post["title"],":id"=>$post["hidden_id"]));
				return true;
	}
	/**
	 * Действие создание
	 * 
	 * @param array $post Массив данных $_POST
	 * @return boolean
	 */
	public function create($post){
	
		Database::getInstance()->query("insert into topic(topic_title,discipline_id)
					values(:title,:discipline_id)"
				,array(":title"=>$post["title"],":discipline_id"=>$post["discipline_select"]));
				return true;
	}
	/**
	 * Действие удаление
	 * 
	 * @param array $post Массив данных $_POST
	 * @return boolean
	 */
	public function delete($post){

		Database::getInstance()->query("delete from discipline where id =:id",array(":id"=>$post["hidden_id"]));
		return true;
	}
}
?>
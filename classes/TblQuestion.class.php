<?php
/**
 * Класс TblQuestion Класс Вопросы
 *
 *
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 * @package Tables
 * @category Models
 */

/**
 * Класс TblQuestion Класс Вопросы
 *
 */
 class TblQuestion extends Table implements IHtmlHelpers{
 	/**
 	 * Конструктор
 	 *
 	 * @param string $where Условие
 	 * @param array $params Параметры для условия отбора
 	 * @param string $limit Лимит
 	 * @param string $order_by Сортировка
 	 */
	public function __construct($where="",$params=array(),$limit="",$order_by=" ORDER BY t.discipline_id, q.topic_id"){
		$this->sql="select q . * , t.topic_title, t.discipline_id, d.discipline_title
					FROM question q
					LEFT JOIN topic t ON q.topic_id = t.id
					LEFT JOIN discipline d ON t.discipline_id = d.id where 1=1 ";
		parent::__construct($where,$params,$limit,$order_by);
	}
	/**
	 * Определить значение ключа по наименованию
	 * @param unknown $title
	 * @param unknown $topic_id
	 * @return number
	 */
	public static function getIdByTitle($title,$topic_id)
	{
		$res = Database::getInstance()->query("select id from question where question_title=:title and topic_id=:topic_id"
				,array(":title"=>$title,":topic_id"=>$topic_id),PDO::FETCH_ASSOC);
		$id = count($res)==0?0:$res[0]["id"];
		if ($id==0){
			Database::getInstance()->query("insert into question(question_title,topic_id,rating_cost) 
					values(:title,:topic_id,1)"
					,array(":title"=>$title,":topic_id"=>$topic_id));
					$id=Database::getInstance()->lastInsertId();
		}
		return $id;
	}
	/**
	 * 
	 * @return Ambigous <multitype:, unknown>
	 */
	public function GetQuestionHierarchy()
	{
		$ret = array();
		foreach ($this as $value)
		{
			$ret[$value["discipline_title"]] [$value["topic_title"]] ["detail"][]=$value;
		}
	
		return $ret;
	}
	/**
	 * Выбрать данные для Html хелпера
	 * @param array $params Параметры условий отбора
	 * @param string $where Условие отбора
	 * @return array
	 */
	public static function GetDataForSelect($params=array(),$where){
		$strsql = "select q.id,q.question_title from question q left join topic t on q.topic_id = t.id
where 1=1 ".Database::GetParamStr($params).$where ;

		$res = Database::getInstance()->query($strsql
				,$params,PDO::FETCH_ASSOC);
		$ret = array();
		foreach ($res as $itm){
			$ret[$itm["id"]]=$itm["question_title"];
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
		Database::getInstance()->query("update question set question_title = :title,topic_id=:topic_id
				,rating_cost=:rating where id=:id"
				,array(":title"=>$post["title"],":topic_id"=>$post["topic_select"],":rating"=>$post["rating"],":id"=>$post["hidden_id"]));
		return true;
	}
	/**
	 * Действие создание
	 *
	 * @param array $post Массив данных $_POST
	 * @return boolean
	 */	
	public function create($post){

		Database::getInstance()->query("insert into question(question_title,topic_id,rating_cost)
					values(:title,:topic_id,:rating)"
				,array(":title"=>$post["title"],":topic_id"=>$post["topic_select"],":rating"=>$post["rating"]));
		return true;
	}
	/**
	 * Действие удаление
	 *
	 * @param array $post Массив данных $_POST
	 * @return boolean
	 */
	public function delete($post){
		Database::getInstance()->query("delete from question where id =:id",array(":id"=>$post["hidden_id"]));
		return true;
	}
}
?>
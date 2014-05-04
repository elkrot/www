<?php
/**
 * Класс TblAnswer Класс ответов
 *
 *
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 * @package Tables
 * @category Models
 */

/**
 * Класс TblAnswer Класс ответов
 *
 */
 class TblAnswer extends Table {
 	/**
 	 * Конструктор
 	 * 
 	 * @param string $where Условие 
 	 * @param array $params Параметры для условия отбора
 	 * @param string $limit Лимит
 	 * @param string $order_by Сортировка
 	 */
	public function __construct($where="",$params=array(),$limit="",$order_by=""){
		$this->sql="select a.*,q.question_title from answer a left join question q on a.question_id = q.id  where 1=1 ";
		parent::__construct($where,$params,$limit,$order_by);
	}
	/**
	 * Определить Ключ по Наименованию
	 * @param unknown $title
	 * @param unknown $question_id
	 * @param unknown $is_right
	 * @return number
	 */
	public static function getIdByTitle($title,$question_id,$is_right)
	{
		$res = Database::getInstance()->query("select id from answer where answer_title=:title and question_id=:question_id"
				,array(":title"=>$title,":question_id"=>$question_id),PDO::FETCH_ASSOC);
	$id = count($res)==0?0:$res[0]["id"];
		if ($id==0)
		{
			Database::getInstance()->query("insert into answer(answer_title,question_id,is_right) values(:title,:question_id,:is_right)"
					,array(":title"=>$title,":question_id"=>$question_id,":is_right"=>$is_right));
			$id=Database::getInstance()->lastInsertId();
		}
		return $id;
	}
	/**
	 * Действие редактирования 
	 * 
	 * @param array $post Массив данных $_POST
	 * @return boolean
	 */
	public function edit($post=array()){
			
		Database::getInstance()->query("update answer set answer_title = :title
				,is_right=:is_right where id=:id"
				,array(":title"=>$post["title"],":is_right"=>$post["check_box_is_right"],":id"=>$post["hidden_id"]));
				return true;
	}
	/**
	 * Действие создание
	 * 
	 * @param array $post Массив данных $_POST
	 * @return boolean
	 */
	public function create($post){
	
		Database::getInstance()->query("insert into answer(answer_title,question_id,is_right)
					values(:answer_title,:question_id,:is_right)"
				,array(":answer_title"=>$post["title"],":question_id"=>$post["question_select"],":is_right"=>$post["check_box_is_right"]));
				return true;
	}
	/**
	 * Действие удаление
	 * 
	 * @param array $post Массив данных $_POST
	 * @return boolean
	 */
	public function delete($post){

		Database::getInstance()->query("delete from answer where id =:id",array(":id"=>$post["hidden_id"]));
		return true;
	}
}
?>
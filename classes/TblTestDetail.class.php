<?php
/**
 * Класс TblTestDetail Класс Детали Тестов
 *
 *
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 * @package Tables
 * @category Models
 */

/**
 * Класс TblTestDetail Класс Детали Тестов
 *
 */
 class TblTestDetail extends Table {
 	/**
 	 * Конструктор
 	 * 
 	 * @param string $where Условие 
 	 * @param array $params Параметры для условия отбора
 	 * @param string $limit Лимит
 	 * @param string $order_by Сортировка
 	 */
	public function __construct($where="",$params=array(),$limit="",$order_by=" order by d.sort "){
		$this->sql="select d.test_id,d.question_id,d.sort,q.question_title
				 from test_detail d left join question q on q.id=d.question_id where 1=1 ";
		parent::__construct($where,$params,$limit,$order_by);
	}
	/**
	 * Действие редактирования 
	 * 
	 * @param array $post Массив данных $_POST
	 * @return boolean
	 */
	public static  function edit($post=array()){
		Database::getInstance()->query("update test_detail set sort=:sort
				 where test_id=:test_id and question_id = :question_id"
				,array(":question_id"=>$post["question_id"],":test_id"=>$post["test_id"],":sort"=>$post["sort"]
				,":id"=>$post["id"]));
				return true;
	}
	/**
	 * Действие создание
	 * 
	 * @param array $post Массив данных $_POST
	 * @return boolean
	 */
	public static function create($post){
		Database::getInstance()->query("insert into test_detail(test_id,question_id,sort)
					values(:test_id,:question_id,1)"
				,array(":question_id"=>$post["question_select"],":test_id"=>$post["hidden_test_id"]));
				return true;
	}
	/**
	 * Действие удаление
	 * 
	 * @param array $post Массив данных $_POST
	 * @return boolean
	 */
	public static function delete($post){	
		Database::getInstance()->query("delete from test_detail where test_id =:test_id and question_id = :question_id"
				,array(":question_id"=>$post["question_id"],":test_id"=>$post["test_id"]));
		return true;
	}
}
?>
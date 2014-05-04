<?php
/**
 * Класс TblTest Класс тестов
 *
 *
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 * @package Tables
 * @category Models
 */

/**
 * Класс TblTest Класс тестов
 *
 */
 class TblTest extends Table  implements IHtmlHelpers{
 	/**
 	 * Конструктор
 	 * 
 	 * @param string $where Условие 
 	 * @param array $params Параметры для условия отбора
 	 * @param string $limit Лимит
 	 * @param string $order_by Сортировка
 	 */
	public function __construct($where="",$params=array(),$limit="",$order_by=" order by t.discipline_id"){
		$this->sql="select t . * , d.discipline_title FROM test t
LEFT JOIN discipline d ON d.id = t.discipline_id where 1=1 ";
		parent::__construct($where,$params,$limit,$order_by);
	}
	/**
	 * 
	 * @return Ambigous <multitype:, unknown>
	 */
	public function GetTestHierarchy()
	{
		$ret = array();
		foreach ($this as $value)
		{
			$ret[$value["discipline_title"]]["detail"][]=$value;
		}
		return $ret;
	}
	/**
	 * Действие редактирования 
	 * 
	 * @param array $post Массив данных $_POST
	 * @return boolean
	 */
	public static  function edit($post=array()){
		Database::getInstance()->query("update test set test_title = :title,discipline_id=:discipline_id
				 where id=:id"
				,array(":title"=>$post["title"],":discipline_id"=>$post["discipline_select"],":id"=>$post["hidden_id"]));
				return true;
	}
	/**
	 * Действие создание
	 * 
	 * @param array $post Массив данных $_POST
	 * @return boolean
	 */
	public static function create($post){
		Database::getInstance()->query("insert into test(test_title,discipline_id)
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
	public static function delete($post){
		Database::getInstance()->query("delete from test where id =:id",array(":id"=>$post["hidden_id"]));
		return true;
	}
	/**
	 * Выбрать данные из таблицы Детали теста
	 * @param number $id Значение первичного ключа
	 * @return TblTestDetail
	 */
	public static function GetTestDetal($id){
		$tblTestDetail = new TblTestDetail(" and d.test_id=:test_id",array(":test_id"=>$id));
		return $tblTestDetail ;
	}
	/**
	 * 
	 * Выбрать данные для Html хелпера
	 * @param array $params Параметры условий отбора
	 * @param string $where Условие отбора
	 * @return array
	 */
	public static function GetDataForSelect($params=array(),$where=""){
		$res = Database::getInstance()->query("select id,test_title from test  where 1=1 ".Database::GetParamStr($params)
				,$params,PDO::FETCH_ASSOC);
		$ret = array();
		foreach ($res as $itm){
			$ret[$itm["id"]]=$itm["test_title"];
		}
		return $ret;
	}
}
?>
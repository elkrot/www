<?php
/**
 * Класс TblDiscipline Класс Дисциплины
 *
 *
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 * @package Tables
 * @category Models
 */

/**
 * Класс TblDiscipline Класс Дисциплины
*
*/
 class TblDiscipline extends Table implements IHtmlHelpers {
 	/**
 	 * Конструктор
 	 *
 	 * @param string $where Условие
 	 * @param array $params Параметры для условия отбора
 	 * @param string $limit Лимит
 	 * @param string $order_by Сортировка
 	 */
	public function __construct($where="",$params=array(),$limit=""){
		$this->sql="select * from discipline where 1=1 ";
		parent::__construct($where,$params,$limit);
	}
	/**
	 * Вернуть значение первичного ключа по наименованию
	 * 
	 * @param string $title Наименование
	 * @return number
	 */
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
	/**
	 * Выбрать данные для Html хелпера
	 * @param array $params Параметры условий отбора
	 * @param string $where Условие отбора
	 * @return array
	 */
	public static function GetDataForSelect($params=array(),$where=""){
		$res = Database::getInstance()->query("select id,discipline_title from discipline  where 1=1 ".Database::GetParamStr($params)
				,$params,PDO::FETCH_ASSOC);
		$ret = array();
		foreach ($res as $itm){
			$ret[$itm["id"]]=$itm["discipline_title"];
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

		Database::getInstance()->query("update discipline set discipline_title = :title
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
	
		Database::getInstance()->query("insert into discipline(discipline_title)
					values(:title)"
				,array(":title"=>$post["title"]));
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
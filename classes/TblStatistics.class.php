<?php
/**
 * Класс TblStatistics Класс тестов
 *
 *
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 * @package Tables
 * @category Models
 */

/**
 * Класс TblStatistics Класс тестов
 *
 */
 class TblStatistics extends Table {
 	/**
 	 * Конструктор 
 	 * 
 	 * @param string $where условие отбора данных
 	 * @param array $params параметры условия отбора
 	 * @param string $limit Лимит данных
 	 * @param string $order_by Сортировка
 	 */
	public function __construct($where="",$params=array(),$limit="",$order_by=""){
		$this->sql="select s.*,t.test_title from statistics s left join test t on t.id = s.test_id where 1=1 ";

		parent::__construct($where,$params,$limit,$order_by);
	}
	/**
	 * Определить Значение поля первичного ключа таблицы статистики
	 * 
	 * @return number
	 */
	public static function GetStatisticsID(){
		Database::getInstance()->query("insert into statistics(userid,date_start)
					values(:userid,now())"
				,array(":userid"=>Authentication::getUserId()));
				return Database::getInstance()->lastInsertId();
	}
	/**
	 * Обновить таблицу статистики по ключу id
	 * @param number $id Значение ключа
	 * @param number $rating Оценка общая
	 * @param number $test_id Иде таблицы Тестов
	 * @param string $serialized Сериализованный объект пройденного теста
	 */
	public static function SetStatistics($id,$rating,$test_id,$serialized) {

				Database::getInstance()->query("update statistics set date_end= now()
						,total_time = timediff(now(),date_start),rating=:rating,test_id = :test_id
						,serialized=:serialized
					where id = :id"
				,array(":rating"=>$rating,":id"=>$id,":test_id"=>$test_id,":serialized"=>$serialized));
	}
}
?>
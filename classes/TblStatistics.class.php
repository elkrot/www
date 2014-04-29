<?php
/**
 * Класс TblStatistics Класс тестов
 *
 *
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 */
 class TblStatistics extends Table {
	public function __construct($where="",$params=array(),$limit="",$order_by=""){
		$this->sql="select s.*,t.test_title from statistics s left join test t on t.id = s.test_id where 1=1 ";

		parent::__construct($where,$params,$limit,$order_by);
	}
	
	public static function GetStatisticsID(){
		Database::getInstance()->query("insert into statistics(userid,date_start)
					values(:userid,now())"
				,array(":userid"=>Authentication::getUserId()));
				return Database::getInstance()->lastInsertId();
	}
	public static function SetStatistics($id,$rating,$test_id,$serialized) {

				Database::getInstance()->query("update statistics set date_end= now()
						,total_time = timediff(now(),date_start),rating=:rating,test_id = :test_id
						,serialized=:serialized
					where id = :id"
				,array(":rating"=>$rating,":id"=>$id,":test_id"=>$test_id,":serialized"=>$serialized));
	}
}
?>
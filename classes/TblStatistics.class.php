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
		$this->sql="select * from statistics where 1=1 ";
		parent::__construct($where,$params,$limit,$order_by);
	}
	
	public static function GetStatisticsID(){
		Database::getInstance()->query("insert into statistics(userid,date_start)
					values(:userid,now())"
				,array(":userid"=>Authentication::getUserId()));
				return Database::getInstance()->lastInsertId();
	}
	public static function SetStatistics($id) {
		$rating=1;
				Database::getInstance()->query("update statistics set date_end= now(),total_time = timediff(now(),date_start),rating=:rating
					where id = :id"
				,array(":rating"=>$rating,":id"=>$id));
	}
}
?>
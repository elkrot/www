<?php
/**
 * Класс TblTestDetail Класс Детали Тестов
 *
 *
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 */
 class TblTestDetail extends Table {

	public function __construct($where="",$params=array(),$limit="",$order_by=" order by d.sort "){
		$sql="select d.test_id,d.npp,d.question_id,d.sort,q.question_title
				 from test_detail d left join question q on q.id=d.question_id where 1=1";
		parent::__construct($where,$params,$limit,$order_by);
	}
}
?>
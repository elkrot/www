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
		$this->sql="select d.test_id,d.question_id,d.sort,q.question_title
				 from test_detail d left join question q on q.id=d.question_id where 1=1 ";
		parent::__construct($where,$params,$limit,$order_by);
	}
	
	public static  function edit($post=array()){
		Database::getInstance()->query("update test_detail set sort=:sort
				 where test_id=:test_id and question_id = :question_id"
				,array(":question_id"=>$post["question_id"],":test_id"=>$post["test_id"],":sort"=>$post["sort"]
				,":id"=>$post["id"]));
				return true;
	}
	
	public static function create($post){
		Database::getInstance()->query("insert into test_detail(test_id,question_id,sort)
					values(:test_id,:question_id,1)"
				,array(":question_id"=>$post["question_select"],":test_id"=>$post["test_select"]));
				return true;
	}
	
	public static function delete($post){	
		Database::getInstance()->query("delete from test_detail where test_id =:test_id and question_id = :question_id"
				,array(":question_id"=>$post["question_id"],":test_id"=>$post["test_id"]));
		return true;
	}
}
?>
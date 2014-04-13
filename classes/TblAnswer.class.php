<?php
/**
 * Класс TblAnswer Класс ответов
 *
 *
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 */
 class TblAnswer extends Table {
	public function __construct($where="",$params=array(),$limit="",$order_by=""){
		$this->sql="select a.*,q.question_title from answer a left join question q on a.question_id = q.id  where 1=1 ";
		parent::__construct($where,$params,$limit,$order_by);
	}
	
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
	
	public function edit($post=array()){
			Logger::getInstance()->log("edit".serialize($post));
		Database::getInstance()->query("update answer set answer_title = :title
				,is_right=:is_right where id=:id"
				,array(":title"=>$post["title"],":is_right"=>$post["check_box_is_right"],":id"=>$post["hidden_id"]));
				return true;
	}
	
	public function create($post){
	
		Database::getInstance()->query("insert into answer(answer_title,question_id,is_right)
					values(:answer_title,:question_id,:rating)"
				,array(":answer_title"=>$post["title"],":question_id"=>$post["question_select"],":is_right"=>$post["check_is_right"]));
				return true;
	}
	public function delete($post){

		Database::getInstance()->query("delete from answer where id =:id",array(":id"=>$post["hidden_id"]));
		return true;
	}
}
?>
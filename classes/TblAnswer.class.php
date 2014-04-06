<?php
/**
 * Класс TblAnswer Класс ответов
 *
 *
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 */
 class TblAnswer extends Table {
	public function __construct(){
		$this->sql="select * from answer where 1=1 ";
		parent::__construct();
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
}
?>
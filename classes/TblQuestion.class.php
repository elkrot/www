<?php
 class TblQuestion extends Table {
	public function __construct(){
		$sql="select * from question ";
		parent::__construct();
	}
	
	public static function getIdByTitle($title,$topic_id)
	{
		$res = Database::getInstance()->query("select id from question where question_title=:title and topic_id=:topic_id"
				,array(":title"=>$title,":topic_id"=>$topic_id),PDO::FETCH_ASSOC);
		$id = count($res)==0?0:$res[0]["id"];
		if ($id==0){
			Database::getInstance()->query("insert into question(question_title,topic_id,rating_cost) 
					values(:title,:topic_id,1)"
					,array(":title"=>$title,":topic_id"=>$topic_id));
					$id=Database::getInstance()->lastInsertId();
		}
		return $id;
	}
}
?>
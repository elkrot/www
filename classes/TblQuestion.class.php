<?php
 class TblQuestion extends Table {
	public function __construct($where="",$params=array(),$limit="",$order_by=" ORDER BY t.discipline_id, q.topic_id"){
		$this->sql="select q . * , t.topic_title, t.discipline_id, d.discipline_title
					FROM question q
					LEFT JOIN topic t ON q.topic_id = t.id
					LEFT JOIN discipline d ON t.discipline_id = d.id ";
		parent::__construct($where,$params,$limit,$order_by);
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
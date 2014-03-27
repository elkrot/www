<?php
 class TblTopic extends Table {
	public function __construct(){
		$sql="select * from topic ";
		parent::__construct();
	}
	
 	public static function getIdByTitle($title,$discipline_id)
	{
		$res = Database::getInstance()->query("select id from topic where topic_title=:title 
				and discipline_id=:discipline_id"
				,array(":title"=>$title, ":discipline_id"=>$discipline_id),PDO::FETCH_ASSOC);
		$id = count($res)==0?0:$res[0]["id"];

		if ($id==0){
			Database::getInstance()->query("insert into topic(topic_title,discipline_id) values(:title,:discipline_id)"
					,array(":title"=>$title, ":discipline_id"=>$discipline_id));
			$id=Database::getInstance()->lastInsertId();
		}
		return $id;
	}
}
?>
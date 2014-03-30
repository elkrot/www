<?php
 class TblTmp extends Table {
	public function __construct($where="",$params=array(),$limit=""){
		$this->sql="select * from tmp where 1=1 ";
		parent::__construct($where,$params,$limit);
	}
	
	public function ExportData()
	{
		foreach ( $this as $itm ) {
			$data = unserialize ( $itm ["data"] );		
			foreach ( $data as $dataitm ) {
				$is_right = $dataitm [4];
				$discipline_id = TblDiscipline::getIdByTitle ( $dataitm[0] );
				$topic_id = TblTopic::getIdByTitle ( $dataitm[1], $discipline_id );
				$question_id = TblQuestion::getIdByTitle ( $dataitm[2], $topic_id );
				$answer_id = TblAnswer::getIdByTitle ( $dataitm[3], $question_id, $is_right );
			}
		}
	}

}
?>
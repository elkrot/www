<?php
require_once "./classes/autoload.php";
require_once "./cnf/config.php";
$action = isset ( $_GET ["action"] ) ? $_GET ["action"] : "";
$target = isset ( $_GET ["target"] ) ? $_GET ["target"] : "";
$temp_id = isset ( $_GET ["temp_id"] ) ? $_GET ["temp_id"] : 0;
if ($action == "import") {
	$temp_id = uploadFile::uploadData ();
	if ($temp_id > 0) {
		header ( 'Location: ' . SERVER_NAME_URL . '?action=view&target=tmp&temp_id=' . $temp_id );
	}
}

if ($action == "view") {
	if ($target == "tmp") {
		$tbltmp = new TblTmp ( " and id = :id", array (
				":id" => $temp_id 
		) );
		
		if (isset ( $_POST["export_id"] )) {
			
			foreach ( $tbltmp as $itm ) {
				$data = unserialize ( $itm ["data"] );
				
				foreach ( $data as $dataitm ) {
					
					$is_right = $dataitm [4];
					$discipline_id = TblDiscipline::getIdByTitle ( $dataitm[0] );

					$topic_id = TblTopic::getIdByTitle ( $dataitm[1], $discipline_id );
					$answer_id = TblAnswer::getIdByTitle ( $dataitm[3], $question_id, $is_right );
					$question_id = TblQuestion::getIdByTitle ( $dataitm[2], $topic_id );
					
				}
			}
		} else {
		}
	}
}

require_once "./templates/index.tpl";
<?php
require_once "./classes/autoload.php";
require_once "./cnf/config.php";
$action = isset ( $_GET ["action"] ) ? htmlspecialchars ( $_GET ["action"] ) : "";
$target = isset ( $_GET ["target"] ) ? htmlspecialchars ( $_GET ["target"] ) : "";
$temp_id = isset ( $_GET ["temp_id"] ) ? ( int ) $_GET ["temp_id"] : 0;

if ($action == "import") {
	$temp_id = uploadFile::uploadData ();
	if ($temp_id > 0) {
		header ( 'Location: ' . SERVER_NAME_URL . '?target=tmp&action=list&temp_id=' . $temp_id );
	}
}


		switch ($target) {
			case "tmp" :
				switch ($action ) 
				{
					case "view":
						$h2 = "Предварительный просмотр данных из файла импорта";
						$tbltmp = new TblTmp ( " and id = :id", array (
								":id" => $temp_id 
						) );
						if (isset ( $_POST ["export_id"] )) {
							$tbltmp->ExportData ();
							header ( 'Location: ' . SERVER_NAME_URL . '?target=discipline&action=list' );
							break;
						}
				}
				break;
			case "discipline" :
				$h2 = "Дисциплины";
				switch ($action ) {
					case "list":
						$where="";
						$params=array();
					
						break;
					
					case "view":
						$where="";
						$params=array();
						
						break;
					case "edit":
						
						break;
					case "delete":
						
						break;
				}
				$tblDiscipline = new TblDiscipline($where,$params);
				break;
			case "question" :
				$h2 = "Вопросы";
				$tblQuestion = new TblQuestion();
				$questionHierarchy = $tblQuestion->GetQuestionHierarchy();
				break;
			case "test" :
				$h2 = "Тесты";
				$tblTest = new TblQuestion();
				
				break;
			case "answer" :
				$h2 = "Ответы";
				$tblAnswer = new TblAnswer();
				
				break;
			case "topic" :
				$h2 = "Темы";
				$tblTopic = new TblTopic();
				
				$topicHierarchy = $tblTopic->GetTopicHierarchy();
				break;
			default :
				
				break;
		}



require_once "./templates/index.tpl";
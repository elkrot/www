<?php
require_once "./classes/autoload.php";
require_once "./cnf/config.php";
$action = isset ( $_GET ["action"] ) ? htmlspecialchars ( $_GET ["action"] ) : "";
$target = isset ( $_GET ["target"] ) ? htmlspecialchars ( $_GET ["target"] ) : "";
$temp_id = isset ( $_GET ["temp_id"] ) ? ( int ) $_GET ["temp_id"] : 0;

if ($action == "import") {
	$temp_id = uploadFile::uploadData ();
	if ($temp_id > 0) {
		header ( 'Location: ' . SERVER_NAME_URL . '?action=view&target=tmp&temp_id=' . $temp_id );
	}
}

if ($action == "view") {
	switch ($target) {
		case "tmp" :
			$h2 = "Предварительный просмотр данных из файла импорта";
			$tbltmp = new TblTmp ( " and id = :id", array (":id" => $temp_id ) );
			if (isset ( $_POST ["export_id"] )) {
				$tbltmp->ExportData ();
				header ( 'Location: ' . SERVER_NAME_URL . '?action=view&target=discipline' );
			}
			break;
		case "discipline" :
			$h2 = "Дисциплины";
			$tblDiscipline = new TblDiscipline();
			break;
		case "question" :
			$h2 = "Вопросы";
			$tblQuestion = new TblQuestion();
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
			;
			break;
	}
}

require_once "./templates/index.tpl";
<?php
$h2 = "Вопросы";
$id_get = isset($_GET["id"])?$_GET["id"]:0;

switch ($action ) {
	case "list":
		$h2 = "Список ".$h2;
		$where="";
		$params=array();
		break;
	case "view":
		$h2 = "Просмотр ".$h2;
		$where="";
		$params=array();
		break;
	case "edit":
		$h2 = "Корректировка ".$h2;
		$where =" and q.id=:id";
		$params = array(":id"=>$id_get);
		break;
	case "delete":
		$h2 = "Удаление ".$h2;
		$where =" and q.id=:id";
		$params = array(":id"=>$id_get);
		break;
	case "create":
		$h2 = "Создание новой ".$h2;
		break;

}


$tblQuestion = new TblQuestion($where,$params);
$questionHierarchy = $tblQuestion->GetQuestionHierarchy();

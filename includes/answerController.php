<?php
/**
 * Контроллер Ответов
 * 
 * Контроллер Ответов
 * @package Controllers
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 */

$h2 = "Ответы";
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
		$where =" and a.id=:id";
		$params = array(":id"=>$id_get);
		break;
	case "delete":
		$h2 = "Удаление ".$h2;
		$where =" and a.id=:id";
		$params = array(":id"=>$id_get);
		break;
	case "create":
		$h2 = "Создание новый ".$h2;
		break;
}

$tblAnswer = new TblAnswer($where,$params);
foreach ($tblAnswer as $value) {
	$question_id=$value["question_id"];
}
if (is_array ( $targets ) && in_array ( $target, $targets )) {
	if (empty ( $_POST )) {
		foreach ($tblAnswer as $itm) {
			$question_title=$itm["question_title"];
		}
	} else {
		
		$ret = $tblAnswer->$action ( $_POST );
		if ($ret){
			header ( 'Location: ' . SERVER_NAME_URL . "?target=question&action=view&id=".$question_id );
		}
	}
}
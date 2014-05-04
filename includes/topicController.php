<?php
/**
 * Контроллер Тем
 *
 * @package Controllers
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 */
$h2 = "Темы";
$id_get = isset($_GET["id"])?$_GET["id"]:0;

switch ($action ) {
	case "list":
		$h2 = "Список ".$h2;
		$where="";
		$params=array();
		break;
	case "view":
		$h2 = "Просмотр ".$h2;
		$where = " and t.id =:id";
		$params = array(":id"=>$id_get);
		$tblQuestion = new TblQuestion(" and topic_id=:topic_id",array(":topic_id"=>$id_get));
		break;
	case "edit":
		$h2 = "Корректировка ".$h2;
		$where =" and t.id=:id";
		$params = array(":id"=>$id_get);
		break;
	case "delete":
		$h2 = "Удаление ".$h2;
		$where =" and t.id=:id";
		$params = array(":id"=>$id_get);
		break;
	case "create":
		$h2 = "Создание новой ".$h2;
		break;
}

$tblTopic = new TblTopic($where,$params);
$topicHierarchy = $tblTopic->GetTopicHierarchy();

if (is_array ( $targets ) && in_array ( $target, $targets )) {
	if (empty ( $_POST )) {

	} else {

		$ret = $tblTopic->$action ( $_POST );
		if ($ret){
			header ( 'Location: ' . SERVER_NAME_URL . "?target=topic&action=list" );
		}
	}
}
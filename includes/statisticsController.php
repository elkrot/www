<?php
/**
 * Контроллер Статистики
 * 
 * @package Controllers
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 */
$h2 = "Вопросы";
$id_get = isset ( $_GET ["id"] ) ? $_GET ["id"] : 0;
foreach ( $_POST as $key => $value ) {
	$str .= $key . "=" . $value . ";";
}

switch ($action) {
	case "list" :
		$h2 = "Результаты тестов пользователя " . Authentication::getUserName();
		$where = "";
		$params = array ();
		$tblStatistics = new tblStatistics ( " and s.userid = :userid", array (
				":userid" => Authentication::getUserId () 
		) );
		break;
	case "view" :
		$h2 = "Просмотр ответов";
		$where = " and q.id = :id";
		$params = array (
				":id" => $id_get 
		);
		$tblAnswer = new TblAnswer ( " and question_id=:question_id ", array (
				":question_id" => $id_get 
		) );
		break;
	case "edit" :
		$h2 = "Корректировка " . $h2;
		$where = " and q.id=:id";
		
		$params = array (
				":id" => $id_get 
		);
		
		break;
	case "delete" :
		$h2 = "Удаление " . $h2;
		$where = " and q.id=:id";
		$params = array (
				":id" => $id_get 
		);
		break;
	case "create" :
		$h2 = "Создание новой " . $h2;
		break;
}
if (! in_array ( $action, array (
		"list"
) )) {
	$tblQuestion = new TblQuestion ( $where, $params );
	if (is_array ( $targets ) && in_array ( $target, $targets )) {
		if (empty ( $_POST )) {
			$questionHierarchy = $tblQuestion->GetQuestionHierarchy ();
		} else {
			$ret = $tblQuestion->$action ( $_POST );
			if ($ret) {
				header ( 'Location: ' . SERVER_NAME_URL . "?target=" . $target . "&action=list" );
			}
		}
	}
}
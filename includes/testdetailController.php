<?php
/**
 * Контроллер Подробности тестов
 * 
  * @package Controllers
 */
$h2 = "Вопросы теста";
$test_id_get = isset($_GET["test_id"])?$_GET["test_id"]:0;
$id_get = isset($_GET["id"])?$_GET["id"]:0;
$question_id_get = isset($_GET["question_id"])?$_GET["question_id"]:0;

switch ($action ) {
	case "list":
		$h2 = "Список ".$h2;
		$where="";
		$params=array();
		break;
	case "view":
		$h2 = "Просмотр ".$h2;
		$where =" and d.test_id=:test_id and d.question_id=:question_id";
		$params = array(":id"=>$test_id_get,":question_id"=>$question_id_get);
		//$tblTestDetail = TblTest::GetTestDetal($id_get);
		break;
	case "edit":
		$h2 = "Корректировка ".$h2;
		$where =" and d.test_id=:test_id and d.question_id=:question_id ";
		$params = array(":test_id"=>$test_id_get,":question_id"=>$question_id_get);
		break;
	case "delete":
		$h2 = "Удаление ".$h2;
		$where =" and d.test_id=:id and d.question_id=:question_id";
		$params = array(":test_id"=>$test_id_get,":question_id"=>$question_id_get);
		break;
	case "create":
		$where ="";
		$params =array();
		$h2 = "Создание новый ".$h2;
		$tblTest = new TblTest(" and t.id=:id",array(":id"=>$test_id_get));
		break;
}

$tblTestDetail = new TblTestDetail($where,$params);
if (is_array ( $targets ) && in_array ( $target, $targets )) {
	if (empty ( $_POST )) {
		
		//$testHierarchy = $tblTest->GetTestHierarchy();
	} else {
		$ret = $tblTestDetail::$action ( $_POST );
		if ($ret){
			header ( 'Location: ' . SERVER_NAME_URL . "?target=test&action=view&id=".(int)$test_id_get );
		}
	}
}
<?php
$h2 = "Тесты";
$id_get = isset($_GET["id"])?$_GET["id"]:0;

switch ($action ) {
	case "list":
		$h2 = "Список ".$h2;
		$where="";
		$params=array();
		break;
	case "view":
		$h2 = "Просмотр ".$h2;
		$where =" and t.id=:id";
		$params = array(":id"=>$id_get);
		$tblTestDetail = TblTest::GetTestDetal($id_get);
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
		$where ="";
		$params =array();
		$h2 = "Создание новый ".$h2;
		break;
}

$tblTest = new TblTest($where,$params);
if (is_array ( $targets ) && in_array ( $target, $targets )) {

	
	if (empty ( $_POST )) {
		$testHierarchy = $tblTest->GetTestHierarchy();
	} else {
		$ret = $tblTest::$action ( $_POST );
		if ($ret){
			header ( 'Location: ' . SERVER_NAME_URL . "?target=".$target."&action=list" );
		}
	}
}

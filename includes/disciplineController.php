<?php
/**
 * Контроллер Дисциплин
 * 
 * @package Controllers
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 */
$h2 = "Дисциплины";
$id_get = isset($_GET["id"])?$_GET["id"]:0;

switch ($action ) {
	case "list":
		$h2 = "Список ".$h2;
		$where="";
		$params=array();
		break;
	case "view":
		$h2 = "Просмотр ".$h2;
		$where=" and id=:id";
		$params=array(":id"=>$id_get);
		$tblTopic = new TblTopic(" and discipline_id=:discipline_id",array(":discipline_id"=>$id_get));
		break;
	case "edit":
		$h2 = "Корректировка ".$h2;
		$where =" and id=:id";
		$params = array(":id"=>$id_get);
		break;
	case "delete":
		$h2 = "Удаление ".$h2;
		$where =" and id=:id";
		$params = array(":id"=>$id_get);		
		break;
	case "create":
		$h2 = "Создание новой ".$h2;	
			break;
		
		}
		$tblDiscipline = new TblDiscipline($where,$params);
		
		if (is_array ( $targets ) && in_array ( $target, $targets )) {
			if (empty ( $_POST )) {
				
			} else {

				$ret = $tblDiscipline->$action ( $_POST );
				if ($ret){
					header ( 'Location: ' . SERVER_NAME_URL . "?target=discipline&action=list");
				}
			}
		}
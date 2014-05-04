<?php
/**
 * Контроллер Темповой таблицы
 * 
 * @package Controllers
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 */
switch ($action) {
	case "list" :
		$h2 = "Предварительный просмотр данных из файла импорта";
		$tbltmp = new TblTmp ( " and id = :id", array (
				":id" => $temp_id 
		) );
		if (isset ( $_POST ["export_id"] )) {
			$tbltmp->ExportData ();
			header ( 'Location: ' . SERVER_NAME_URL . '?target=discipline&action=list' );
			break;
		}
	case "import" :
		$temp_id = uploadFile::uploadData ();
		if ($temp_id > 0) {
			header ( 'Location: ' . SERVER_NAME_URL . '?target=tmp&action=list&temp_id=' . $temp_id );
			break;
		}
}
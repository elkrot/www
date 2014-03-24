<?php
require_once "./classes/autoload.php";
require_once "./cnf/config.php";
$action = isset($_GET["action"])?$_GET["action"]:"";
$target = isset($_GET["target"])?$_GET["target"]:"";

if ($action == "import") {
	$temp_id = uploadFile::uploadData ();
	if ($temp_id > 0) {
		header ( 'Location: ' . SERVER_NAME_URL . '?action=view&target=tmp&temp_id=' . $temp_id );
	} 
	
}

if ($action == "view") {
	if ($target =="tmp")
	{
		$tbltmp = new TblTmp(" and id = :id",array(":id"=> isset($_GET["temp_id"])?$_GET["temp_id"]:0));
	}
	
}
require_once "./templates/index.tpl";
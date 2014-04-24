<?php
$h2 = "Тесты";
$id_get = isset ( $_GET ["id"] ) ? $_GET ["id"] : 0;

switch ($action) {
	case "list" :
		$h2 = "Список " . $h2;
		$where = "";
		$params = array ();
		break;
	case "view" :
		$h2 = "Просмотр " . $h2;
		$where = " and t.id=:id";
		$params = array (
				":id" => $id_get 
		);
		$tblTestDetail = TblTest::GetTestDetal ( $id_get );
		break;
	case "edit" :
		$h2 = "Корректировка " . $h2;
		$where = " and t.id=:id";
		$params = array (
				":id" => $id_get 
		);
		break;
	case "delete" :
		$h2 = "Удаление " . $h2;
		$where = " and t.id=:id";
		$params = array (
				":id" => $id_get 
		);
		break;
	case "create" :
		$where = "";
		$params = array ();
		$h2 = "Создание новый " . $h2;
		break;
	case "goto" :
		$where = "";
		$params = array ();
		$h2 = "Тестирование ";
		break;
	case "start" :
		
		
		$testToUser = new TestToUser ( " and t.id=:test_id ", array (
				":test_id" => $id_get 
		) );
		
		$testToUserHierarhy = $testToUser->GetTestToUserHierarchy ();
		$global_js = "<script type=\"text/javascript\">

 $(document).ready(function(){
     setInterval(ajaxcall, 1);
 });
 function ajaxcall(){
     $.ajax({
         url: 'gettime.php',
         success: function(data) {
             data = data.split(':'); 
if (data[0]<=0 && data[1]<=0 && data[2]<=0){

	f=document.getElementById('test_form');
    if(f){
    f.submit();
    }
}else{			 
			 $('#hours').html(data[0]);
             $('#minutes').html(data[1]);
             $('#seconds').html(data[2]);}
         }
     });
 }
</script>";
session_start ();
		$currentStatisticsId=TblStatistics::GetStatisticsID();
		$_SESSION ["currentStatisticsId"] = $currentStatisticsId ;		
		$_SESSION ["start_time"]=time();
		break;
	case "finish" :
		if (! empty ( $_POST )) {
			$h2 = "Результат решения теста ";
			session_start ();
			unset ( $_SESSION ["start_time"] );
			$testToUser = new TestToUser ( " and t.id=:test_id ", array (
					":test_id" => $id_get 
			) );
			$testToUserHierarhy = $testToUser->GetTestToUserHierarchy ($_POST);
			session_start ();
			$currentStatisticsId = $_SESSION ["currentStatisticsId"]   ;
			$_SESSION ["currentStatisticsId"]=0;
			TblStatistics::SetStatistics($currentStatisticsId);
		}
		break;
}

if (! in_array ( $action, array (
		"finish",
		"start" 
) )) {
	$tblTest = new TblTest ( $where, $params );
	if (is_array ( $targets ) && in_array ( $target, $targets )) {
		if (empty ( $_POST )) {
			$testHierarchy = $tblTest->GetTestHierarchy ();
		} else {
			$ret = $tblTest::$action ( $_POST );
			if ($ret) {
				header ( 'Location: ' . SERVER_NAME_URL . "?target=" . $target . "&action=list" );
			}
		}
	}
}

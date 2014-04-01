 
<div class="container">
	<div class="row">
        <div class="col-md-12">
		
		<dl class="dl-horizontal">
<?php
foreach ($tbltmp as $itm){
	$data = unserialize($itm["data"]);	        
	//	         ["id"]
	echo "<dt>Краткое описание</dt><dd>".$itm["title"]."</dd>";
	echo "<dt>Дата выгркзки</dt><dd>".$itm["upload_date"]."</dd>";
	echo "<dt>Количество записей</dt><dd>".$itm["count_records"]."</dd>";
	echo "<dt>Тип файла импорта</dt><dd>".$itm["extension"]."</dd>";
	//["userid"]["is_load"]
?>
</dl>
<table class="table table-bordered">
	<th>Дисциплина</th><th>Тема</th><th>Вопрос</th><th>Ответ</th><th>Правильный(+)</th>
<?	
	        foreach($data as $dataitm){
	        echo "<tr><td>".$dataitm[0]."</td><td>".$dataitm[1]."</td><td>".$dataitm[2].
	        "</td><td>".$dataitm[3]."</td><td>".$dataitm[4]."</td></tr>";
	        }
echo "</table>";     
}
?>
        </div>
        <form id = "importform" method = post>
		<input type="text" name="export_id" value = <?php echo isset($temp_id)?$temp_id:0; ?> hidden />
        <input value="Загрузить в БД" type="submit" class="btn btn-primary"/>
        </form>
	</div>
</div>


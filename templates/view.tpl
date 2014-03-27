 
<div class="container">
	<div class="row">
        <div class="col-md-12">
		<h2>Предварительный просмотр данных из файла импорта</h2>
	        <?php
	        foreach ($tbltmp as $itm){
	        
//	         ["id"]
echo $itm["title"]."</br>";
$data = unserialize($itm["data"]);
echo $itm["upload_date"]."</br>";
echo $itm["count_records"]."</br>";
echo $itm["extension"]."</br>";
//["userid"]["is_load"]
	echo "<table class=\"table table-bordered\">
	<th>Дисциплина</th><th>Тема</th><th>Вопрос</th><th>Ответ</th><th>Правильный(+)</th>
	";
	
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


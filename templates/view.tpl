 
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
	
	        foreach($data as $dataitm){
	        echo $dataitm[0]."".$dataitm[1]."".$dataitm[2]."".$dataitm[3]."".$dataitm[4]."</br>";
	        }
	        
	        }
	        ?>
        </div>
	</div>
</div>


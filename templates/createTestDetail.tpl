<form id = "create_form" method ="POST">
	
	<?php foreach ($tblTest as $itm){
	echo "<h2>Тест: ".$itm["test_title"]."</h2><h3>Дисциплина: ".$itm["discipline_title"]."</h3>";
	$discipline_id = $itm["discipline_id"];
	} ?>
	</br>
<?php echo Html::Hidden("test_id",(int)$test_id_get);?>
	<div class="input-group input-group-lg">
	<span class="input-group-addon">Вопрос</span>
		<?php echo Html::Select("question", "",array("discipline_id"=>$discipline_id)," and q.id not in(select question_id from test_detail where test_id=".(int)$test_id_get.")");?>
		<span class="input-group-btn">
			<button type="submit" class="btn btn-success"> Сохранить<button\>
		</span>
	</div>
</form>				

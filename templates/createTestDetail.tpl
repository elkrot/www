<form id = "create_form" method ="POST">
	
	<?php foreach ($tblTest as $itm){
	echo "<h2>Тест: ".$itm["test_title"]."</h2><h3>Дисциплина: ".$itm["discipline_title"]."</h3>";
	$discipline_id = $itm["discipline_id"];
	} ?>
	</br>
<?php  ?>
	<div class="input-group input-group-lg">
	<span class="input-group-addon">Вопрос</span>
		<?php echo Html::Select("question", "",array("discipline_id"=>$discipline_id));?>
		<span class="input-group-btn">
			<button type="submit" class="btn btn-success"> Сохранить<button\>
		</span>
	</div>
</form>				

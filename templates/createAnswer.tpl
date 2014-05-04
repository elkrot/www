<form id = "create_form" method ="POST">
	<div class="input-group input-group-lg">
		<span class="input-group-addon">Вопрос</span>
	<?php echo Html::Select("question", (string)$id_get);?>
	</div>
	</br>
	<?php echo Html::Checkbox("is_right",$itm["is_right"]);?>Правильный ответ
	<div class="input-group input-group-lg">
		<input name = "title" type="text" class="form-control" placeholder="Ответ">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-success"> Сохранить<button\>
		</span>
	</div>
</form>	
<form id = "create_form" method ="POST">
	<div class="input-group input-group-lg">
		<span class="input-group-addon">Дисциплина</span>
		<?php echo Html::Select("discipline", "");?>
	</div>
	</br>
	<div class="input-group input-group-lg">
		<span class="input-group-addon">Тема</span>
		<input name = "title" type="text" class="form-control" placeholder="Наименование темы">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-success"> Сохранить</button>
		</span>
	</div>
</form>

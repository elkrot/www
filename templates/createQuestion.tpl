<form id = "create_form" method ="POST">
	<div class="input-group input-group-lg">
		<span class="input-group-addon">Дисциплина</span>
		<?php echo Html::Select("discipline", "");?>
	</div>
	</br>
	<div class="input-group input-group-lg">
		<span class="input-group-addon">Тема</span>
		<?php echo Html::Select("topic", "");?>
	</div>
	</br>
	<div class="input-group input-group-lg">
		<input name = "rating" type="text" class="form-control" placeholder="Рейтинг">

	</div>
	<textarea class="textarea" name = "title" placeholder="Введите вопрос ..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px;"></textarea>
	<button class="btn btn-success" type="submit" name="submit_button" value="edit"><span class="glyphicon  glyphicon-floppy-saved"></span> Сохранить</button>
</form>			

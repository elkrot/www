<form id = "edit_form" method = "post" >
	<div class="input-group input-group-lg">
		<span class="input-group-addon">Дисциплина</span>
	<?php echo Html::Select("discipline", "");?>
	</div>
	</br>

	<div class="input-group input-group-lg">
		<span class="input-group-addon">Наименование</span>
			<?php foreach ($tblTest as $itm){?>
			<input name = "title" type = "text" class="form-control"  value ="<?php echo $itm["test_title"]; ?>" />
			<?php } ?>
			<span class="input-group-btn">
				<button class="btn btn-success" type="button"><span class="glyphicon  glyphicon-floppy-saved"></span> Сохранить</button>
			</span>
	</div>
</form>
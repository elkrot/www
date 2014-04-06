<form id = "edit_form" method = "post" >
	<div class="input-group input-group-lg">
		<span class="input-group-addon">Наименование</span>
		<?php foreach ($tblDiscipline as $itm){?>
			<input type = "text" class="form-control" name = "title" value ="<?php echo $itm["discipline_title"]; ?>" />
		<?php } ?>
		<span class="input-group-btn">
			<button class="btn btn-success" type="button"><span class="glyphicon  glyphicon-floppy-saved">
			</span> Сохранить</button>
		</span>
	</div>
</form>
<form id = "edit_form" method = "post" >
<?php echo Html::Hidden("id",$id_get);?>
	<div class="input-group input-group-lg">
		<span class="input-group-addon">Наименование</span>
			<?php foreach ($tblTopic as $itm){?>
				<input type = "text" class="form-control" name="title" value ="<?php echo $itm["topic_title"]; ?>" />
			<?php } ?>
			<span class="input-group-btn">
				<button class="btn btn-success" type="submit"><span class="glyphicon  glyphicon-floppy-saved"></span> Сохранить</button>
			</span>
	</div>
</form>	
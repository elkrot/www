<form id = "delete_form" method = "post" >
	<div class="input-group input-group-lg">
		<span class="input-group-addon">Наименование</span>
			<?php foreach ($tblTopic as $itm){?>
				<input type = "text" disabled class="form-control" name="topic_title" value ="<?php echo $itm["topic_title"]; ?>" />
			<?php } ?>
			<span class="input-group-btn">
				<button class="btn btn-success" type="button"><span class="glyphicon  glyphicon-floppy-removed"></span> Удалить</button>
			</span>
	</div>
</form>
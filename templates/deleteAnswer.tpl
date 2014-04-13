<form id = "delete_form" method = "post" >
<?php echo Html::Hidden("id",$id_get);?>
	<div class="input-group input-group-lg">
		<span class="input-group-addon"><b>Ответ:</b></span>
			<?php foreach ($tblAnswer as $itm){?>
			<input type = "text" class="form-control"  value ="<?php echo $itm["answer_title"]; ?>" disabled />
			<?php } ?>
			<span class="input-group-btn">
				<button class="btn btn-success" type="submit"><span class="glyphicon  glyphicon-floppy-remove"></span>Удалить</button>
			</span>
	</div>
</form>	
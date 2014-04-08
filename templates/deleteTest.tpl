<form id = "delete_form" method = "post" >
	<div class="input-group input-group-lg">
		<span class="input-group-addon"><b>Наименование:</b></span>
			<?php foreach ($tblTest as $itm){?>
			<input hidden name="id" value ="<?php echo  $itm["id"];?>" type ="text"/>
			<input type = "text" class="form-control"  value ="<?php echo $itm["test_title"]; ?>" disabled />
			<?php } ?>
			<span class="input-group-btn">
				<button class="btn btn-success" type="submit" name="submit_button"><span class="glyphicon  glyphicon-floppy-remove"></span> Удалить</button>
			</span>
	</div>
</form>	
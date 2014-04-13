<form id = "edit_form" method = "post" >
<?php echo Html::Hidden("id",$id_get);?>
	<h2><?php echo $question_title;?></h2>	
	<?php echo Html::Checkbox("is_right",$itm["is_right"]);?>Правильный ответ
	<div class="input-group input-group-lg">
		<span class="input-group-addon">Ответ</span>
			<?php foreach ($tblAnswer as $itm){?>
			<input name = "title" type = "text" class="form-control"  value ="<?php echo $itm["answer_title"]; ?>" />
			
			<?php } ?>
			<span class="input-group-btn">
				<button class="btn btn-success" type="submit"><span class="glyphicon  glyphicon-floppy-saved"></span> Сохранить</button>
			</span>
			
	</div>
</form>
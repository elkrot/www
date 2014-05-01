<form id = "edit_form" method = "post" >


		
			<?php foreach ($tblQuestion as $itm){?>
			<input hidden name="id" value ="<?php echo  $itm["id"];?>" type ="text"/>
				<div class="input-group input-group-lg">
					<span class="input-group-addon">Дисциплина</span>
				<?php echo Html::Select("discipline", $itm["discipline_id"]);?>
				</div>
				</br>
				<div class="input-group input-group-lg">
					<span class="input-group-addon">Тема</span>
				<?php echo Html::Select("topic", $itm["topic_id"]);?>
				</div></br>
				<div class="input-group input-group-lg">
					<span class="input-group-addon">Рейтинг</span>
				<input name = "rating" type = "text" class="form-control"  style ="width:100px" value ="<?php echo$itm["rating_cost"];?>" />
				</div>
				</br>

	<textarea class="textarea" name = "title" placeholder="Enter text ..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px;"><?php echo $itm["question_title"]; ?></textarea>
	<button class="btn btn-success" type="submit" name="submit_button" value="edit"><span class="glyphicon  glyphicon-floppy-saved"></span> Сохранить</button>
			<?php } ?>

</form>
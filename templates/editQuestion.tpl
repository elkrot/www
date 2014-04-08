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
				<div class="input-group input-group-lg">
				<span class="input-group-addon">Наименование</span>
			<input name = "title" type = "text" class="form-control"  value ="<?php echo $itm["question_title"]; ?>" />
						<span class="input-group-btn">
				<button class="btn btn-success" type="submit" name="submit_button" value="edit"><span class="glyphicon  glyphicon-floppy-saved"></span> Сохранить</button>
			</span>
	</div>
			<?php } ?>

</form>
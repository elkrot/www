<ul>
		<?foreach ($testHierarchy as $key=>$testItm){?>
		
			<li><?php echo $key; ?>
			<table class="table table-bordered">
				<tr><th >Тест <?php echo Html::Ankor(Html::Link("test","create"),"<span class=\"glyphicon glyphicon-plus-sign\"></span>
<span class=\"glyphicon-class  \"></span>","data-toggle=\"tooltip\" data-original-title=\"Создать запись\""); ?></th><th style="width:10px"></th><th style="width:10px"></th></tr>
					<?foreach ($testItm["detail"] as $itm){?>
					
<tr><td><?php echo Html::Ankor(Html::Link("test","view",(int)$itm["id"]),$itm["test_title"],"data-toggle=\"tooltip\" data-original-title=\"Вопросы теста\"");?></td><td>
<?php echo Html::Ankor(Html::Link("test","delete",(int)$itm["id"]),"<span class=\"glyphicon glyphicon-remove\"></span><span class=\"glyphicon-class\"></span>","data-toggle=\"tooltip\" data-original-title=\"Удалить запись\"");?></td><td>
<?php echo Html::Ankor(Html::Link("test","edit",(int)$itm["id"]),"<span class=\"glyphicon glyphicon-pencil\"></span><span class=\"glyphicon-class\"></span>","data-toggle=\"tooltip\" data-original-title=\"Редактировать запись\"");?>
</td></tr>
					<?php } ?>
			</table>
			</li>
			<?php }  ?>
			</ul>

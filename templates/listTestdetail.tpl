
<div class =" btn btn-default ">
<?php echo Html::Ankor(Html::Link("testdetail","create"),"<span class=\"glyphicon glyphicon-plus-sign\"></span>
<span class=\"glyphicon-class  \">Создать запись</span>"); ?></div>

		
		
			
			<table class="table table-bordered">
				<tr><th >Тест</th><th style="width:100px">Удаление</th><th style="width:100px">Корректировать</th></tr>
					<?foreach ($tblTestDetail as $itm){?>
					
<tr><td><?php echo Html::Ankor(Html::Link("testdetail","view",(int)$itm["id"]),$itm["question_title"]);?></td><td>
<?php echo Html::Ankor(Html::Link("test","delete",(int)$itm["id"]),"<span class=\"glyphicon glyphicon-remove\"></span><span class=\"glyphicon-class\">Удалить</span>");?></td><td>
<?php /*echo Html::Ankor(Html::Link("test","edit",(int)$itm["id"]),"<span class=\"glyphicon glyphicon-pencil\"></span><span class=\"glyphicon-class\">Корректировка</span>");*/?>
</td></tr>
					<?php } ?>
			</table>
		
			<?php }  ?>
		

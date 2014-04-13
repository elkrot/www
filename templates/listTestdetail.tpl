
<div class =" btn btn-default ">
<?php echo Html::Ankor(Html::Link("test","create"),"<span class=\"glyphicon glyphicon-plus-sign\"></span>
<span class=\"glyphicon-class  \">Создать запись</span>"); ?></div>

		<ul>
		<?foreach ($testHierarchy as $key=>$testItm){?>
		
			<li><?php echo $key; ?>
			<table class="table table-bordered">
				<tr><th >Тест</th><th style="width:100px">Удаление</th><th style="width:100px">Корректировать</th></tr>
					<?foreach ($testItm["detail"] as $itm){?>
					
<tr><td><?php echo Html::Ankor(Html::Link("test","view",(int)$itm["id"]),$itm["test_title"]);?></td><td>
<?php echo Html::Ankor(Html::Link("test","delete",(int)$itm["id"]),"<span class=\"glyphicon glyphicon-remove\"></span><span class=\"glyphicon-class\">Удалить</span>");?></td><td>
<?php /*echo Html::Ankor(Html::Link("test","edit",(int)$itm["id"]),"<span class=\"glyphicon glyphicon-pencil\"></span><span class=\"glyphicon-class\">Корректировка</span>");*/?>
</td></tr>
					<?php } ?>
			</table>
			</li>
			<?php }  ?>
			</ul>

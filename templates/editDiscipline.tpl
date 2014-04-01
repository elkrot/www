<div class="container">
	<div class="row">
        <div class="col-md-12">
			<table class="table table-bordered">
				<tr><th>Дисциплина</th><th>Удаление</th><th>Корректировать</th></tr>
					<?foreach ($tblDiscipline as $itm){?>
						<tr><td>
						<?php echo Html::Ankor(Html::Link("discipline","view",$itm["id"]),$itm["discipline_title"]); ?>
						</td><td>
						<?php 
						echo Html::Ankor(Html::Link("discipline","delete",$itm["id"]),"<span class=\"glyphicon glyphicon-remove\"></span><span class=\"glyphicon-class\">Удалить</span>"); ?>
						</td><td>
						<?php 
						echo Html::Ankor(Html::Link("discipline","edit",$itm["id"]),"<span class=\"glyphicon glyphicon-pencil\"></span><span class=\"glyphicon-class\">Корректировка</span>"); ?>
						</td>
						</tr>
					<?php } ?>
			</table>
        </div>
	</div>
</div>


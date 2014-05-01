<div class="container">
	<div class="row">
        <div class="col-md-12">
			<table class="table table-bordered">
				<tr><th>Дисциплина <?php echo Html::Ankor(Html::Link("discipline","create"),"<span class=\"glyphicon glyphicon-plus-sign\"></span>
<span class=\"glyphicon-class  \"></span>","data-toggle=\"tooltip\" data-original-title=\"Добавить новую запись\""); ?></th><th style="width:10px">&nbsp</th><th style="width:10px">&nbsp</th></tr>
					<?foreach ($tblDiscipline as $itm){?>
						<tr><td>
						<?php 
						echo Html::Ankor(Html::Link("discipline","view",(int)$itm["id"]),$itm["discipline_title"],"data-toggle=\"tooltip\" data-original-title=\"Темы к дисциплине\""); ?>
						</td><td>
						<?php 
						echo Html::Ankor(Html::Link("discipline","delete",(int)$itm["id"]),"<span class=\"glyphicon glyphicon-remove\"></span><span class=\"glyphicon-class\"></span>","data-toggle=\"tooltip\" data-original-title=\"Удалить запись\""); ?>
						</td><td>
						<?php 
						echo Html::Ankor(Html::Link("discipline","edit",(int)$itm["id"]),"<span class=\"glyphicon glyphicon-pencil\"></span><span class=\"glyphicon-class\"></span>","data-toggle=\"tooltip\" data-original-title=\"Редактировать запись\""); ?>
						</td>
						</tr>
					<?php } ?>
			</table>
        </div>
	</div>
</div>


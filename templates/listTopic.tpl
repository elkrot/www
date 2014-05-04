<div class="container">

	<div class="row">
        <div class="col-md-12">
			<?foreach ($topicHierarchy as $key=>$itm){?>
			<h3><?php echo $key; ?></h3>
				<table class="table table-bordered">
				<tr><th>Тема <?php echo Html::Ankor(Html::Link("topic","create"),"<span class=\"glyphicon glyphicon-plus-sign\"></span>
					<span class=\"glyphicon-class  \"></span>","data-toggle=\"tooltip\" data-original-title=\"Создать новую запись\""); ?></th><th style="width:10px">&nbsp</th><th  style="width:10px">&nbsp</th></tr>
				<?php foreach ($itm["detail"] as $val){?>
					<tr>
					<td><?php echo Html::Ankor(Html::Link("topic","view",(int)$val["id"]),$val["topic_title"],"data-toggle=\"tooltip\" data-original-title=\"Вопросы к теме\""); ?></td><td>
					<?php
					echo Html::Ankor(Html::Link("topic","delete",(int)$val["id"]),"<span class=\"glyphicon glyphicon-remove\"></span><span class=\"glyphicon-class\"></span>","data-toggle=\"tooltip\" data-original-title=\"Удалить запись\"");
					?>
					</td>
					<td>
					<?php
					echo Html::Ankor(Html::Link("topic","edit",(int)$val["id"]),"<span class=\"glyphicon glyphicon-pencil\"></span><span class=\"glyphicon-class\"></span>","data-toggle=\"tooltip\" data-original-title=\"Редактировать запись\"");
					?>
					</td>
					</tr>
				<?php }?> 
			</table>
			<?php }?>  
        </div>

	</div>
</div>
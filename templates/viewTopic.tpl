<h2><?php foreach ($tblTopic as $itm ){echo $itm["topic_title"];}?></h2>
<div class="container">
	<div class="row">
        <div class="col-md-12">
				<table class="table table-bordered">
				<tr><th>Тема <?php echo Html::Ankor(Html::Link("question","create"),"<span class=\"glyphicon glyphicon-plus-sign\"></span>
					<span class=\"glyphicon-class  \"></span>","data-toggle=\"tooltip\" data-original-title=\"Создать новую запись\""); ?></th><th style="width:10px">&nbsp</th><th  style="width:10px">&nbsp</th></tr>
				<?php foreach ($tblQuestion as $val){?>
					<tr>
					<td><?php echo $val["question_title"]; ?></td><td>
					<?php
					echo Html::Ankor(Html::Link("question","delete",(int)$val["id"]),"<span class=\"glyphicon glyphicon-remove\"></span><span class=\"glyphicon-class\"></span>","data-toggle=\"tooltip\" data-original-title=\"Удалить запись\"");
					?>
					</td>
					<td>
					<?php
					echo Html::Ankor(Html::Link("question","edit",(int)$val["id"]),"<span class=\"glyphicon glyphicon-pencil\"></span><span class=\"glyphicon-class\"></span>","data-toggle=\"tooltip\" data-original-title=\"Редактировать запись\"");
					?>
					</td>
					</tr>
				<?php }?> 
			</table> 
        </div>
	</div>
</div>
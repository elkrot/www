<div class="container">
	<div class="row">
        <div class="col-md-12">
			<?foreach ($topicHierarchy as $key=>$itm){?>
			<h3><?php echo $key; ?></h3>
				<table class="table table-bordered">
				<tr><th>Тема</th><th style="width:100px">Удаление</th><th  style="width:100px">Корректировать</th></tr>
				<?php foreach ($itm["detail"] as $val){?>
					<tr>
					<td><?php echo Html::Ankor(Html::Link("topic","view",$val["id"]),$val["topic_title"]); ?></td><td>
					<?php
					echo Html::Ankor(Html::Link("topic","delete",$val["id"]),"<span class=\"glyphicon glyphicon-remove\"></span><span class=\"glyphicon-class\">удалить</span>");
					?>
					</td>
					<td>
					<?php
					echo Html::Ankor(Html::Link("topic","edit",$val["id"]),"<span class=\"glyphicon glyphicon-pencil\"></span><span class=\"glyphicon-class\">Корректировка</span>");
					?>
					</td>
					</tr>
				<?php }?> 
			</table>
			<?php }?>  
        </div>
	</div>
</div>
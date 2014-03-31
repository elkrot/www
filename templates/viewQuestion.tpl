<div class="container">
	<div class="row">
        <div class="col-md-12">
		<?php foreach ($questionHierarchy as $disciplineKey=>$disciplineItem){?>
			<?php echo $disciplineKey; ?></br>
			
		<?php foreach ($disciplineItem as $topicKey=>$topicItem){?>	
		<?php echo $topicKey;?>
			<table class="table table-bordered">
				<tr><th>Вопрос</th><th  style="width:100px">Удаление</th><th  style="width:100px">Корректировать</th></tr>
					<?php foreach ($topicItem["detail"] as $itm){?>
<tr><td><?php echo$itm["question_title"];?></td><td><span class="glyphicon glyphicon-remove"></span><span class ="glyphicon-class">удалить</span></td><td><span class="glyphicon glyphicon-pencil"></span>
<span class="glyphicon-class">Корректировка</span></td>
								</tr>
					<?php }?>    
					
			</table>
			<?php }?>
			<?php }?>
        </div>
	</div>
</div>
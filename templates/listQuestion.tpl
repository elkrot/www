<div class="container">
	<div class="row">
        <div class="col-md-12">
		<ul>
		<?php foreach ($questionHierarchy as $disciplineKey=>$disciplineItem){?>
			<li><?php echo $disciplineKey; ?>
			<ul>
				<?php foreach ($disciplineItem as $topicKey=>$topicItem){?>	
				<li><?php echo $topicKey;?>
				
					<table class="table table-bordered">
						<tr><th>Вопрос <?php echo Html::Ankor(Html::Link("question","create"),"<span class=\"glyphicon glyphicon-plus-sign\"></span>
<span class=\"glyphicon-class  \"></span>","data-toggle=\"tooltip\" data-original-title=\"Добавить новую запись\""); ?></th><th  style="width:10px">&nbsp</th><th  style="width:10px">&nbsp</th></tr>
							<?php foreach ($topicItem["detail"] as $itm){ ?>
								<tr><td><?php echo Html::Ankor(Html::Link("question","view",(int)$itm["id"]),$itm["question_title"],"data-toggle=\"tooltip\" data-original-title=\"Посмотреть ответы\"");?></td><td>
								<?php echo Html::Ankor(Html::Link("question","delete",(int)$itm["id"]),"<span class=\"glyphicon glyphicon-remove\"></span><span class =\"glyphicon-class\"></span>"," data-toggle=\"tooltip\" data-original-title=\"Удалить запись\""); ?>
								</td><td>
								<?php echo Html::Ankor(Html::Link("question","edit",(int)$itm["id"]),"<span class=\"glyphicon glyphicon-pencil\"></span><span class=\"glyphicon-class\"></span>"," data-toggle=\"tooltip\" data-original-title=\"Редактировать запись\""); ?>
								</td>
								</tr>
							<?php }?>    
					</table>
				</li>
			<?php }?>
			</ul>
			</li>
		<?php }?>
		</ul>
        </div>
	</div>
</div>
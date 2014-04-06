<div class="container">


	<div class="row">
        <div class="col-md-12">
		<ul>
		<?php foreach ($questionHierarchy as $disciplineKey=>$disciplineItem){?>
			<li><?php echo $disciplineKey; ?>
			<ul>
				<?php foreach ($disciplineItem as $topicKey=>$topicItem){?>	
				<li><?php echo $topicKey;?>
				<div class =" btn btn-default "><?php echo Html::Ankor(Html::Link("question","create"),"<span class=\"glyphicon glyphicon-plus-sign\"></span>
<span class=\"glyphicon-class  \">Создать запись</span>"); ?></div>
					<table class="table table-bordered">
						<tr><th>Вопрос</th><th  style="width:100px">Удаление</th><th  style="width:100px">Корректировать</th></tr>
							<?php foreach ($topicItem["detail"] as $itm){ ?>
								<tr><td><?php echo Html::Ankor(Html::Link("question","view",(int)$itm["id"]),$itm["question_title"]);?></td><td>
								<?php echo Html::Ankor(Html::Link("question","delete",(int)$itm["id"]),"<span class=\"glyphicon glyphicon-remove\"></span><span class =\"glyphicon-class\">Удалить</span>"); ?>
								</td><td>
								<?php echo Html::Ankor(Html::Link("question","edit",(int)$itm["id"]),"<span class=\"glyphicon glyphicon-pencil\"></span><span class=\"glyphicon-class\">Корректировка</span>"); ?>
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
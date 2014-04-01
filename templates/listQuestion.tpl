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
						<tr><th>Вопрос</th><th  style="width:100px">Удаление</th><th  style="width:100px">Корректировать</th></tr>
							<?php foreach ($topicItem["detail"] as $itm){ ?>
								<tr><td><?php echo Html::Ankor(Html::Link("question","view",$itm["id"]),$itm["question_title"]);?></td><td>
								<?php echo Html::Ankor(Html::Link("question","delete",$itm["id"]),"<span class=\"glyphicon glyphicon-remove\"></span><span class =\"glyphicon-class\">Удалить</span>"); ?>
								</td><td>
								<?php echo Html::Ankor(Html::Link("question","edit",$itm["id"]),"<span class=\"glyphicon glyphicon-pencil\"></span><span class=\"glyphicon-class\">Корректировка</span>"); ?>
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
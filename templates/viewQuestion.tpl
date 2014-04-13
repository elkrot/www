		<?php foreach ($tblQuestion as $itmQuestion){?>
			<h2><?php echo $itmQuestion["question_title"]; ?></h2>
			<table class="table table-bordered">
				<tr><th>Ответ</th><th>+</th><th><span class="glyphicon glyphicon-remove"></span></th><th><span class="glyphicon glyphicon-pencil"></span></th></tr>
					<?php foreach ($tblAnswer as $itmAnswer){?>
						<tr><td>
						<?php echo $itmAnswer["answer_title"] ; ?>
						</td><td>
						<?php echo $itmAnswer["is_right"] ;?>
						</td><td>
						<?php 
						echo Html::Ankor(Html::Link("answer","delete",(int)$itmAnswer["id"]),"<span class=\"glyphicon glyphicon-remove\"></span><span class=\"glyphicon-class\"></span>"); ?>
						</td><td>
						<?php 
						echo Html::Ankor(Html::Link("answer","edit",(int)$itmAnswer["id"]),"<span class=\"glyphicon glyphicon-pencil\"></span><span class=\"glyphicon-class\"></span>"); ?>
						</td>
						</tr>
					<?php } ?>
			</table>
		<?php }?>

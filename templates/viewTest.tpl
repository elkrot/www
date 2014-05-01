<h2><?php foreach ($tblTest as $itm ){echo $itm["test_title"];}?></h2>

<div class="container">


	<div class="row">
        <div class="col-md-12">
			<table class="table table-bordered">
				<tr><th>Вопрос <?php echo Html::Ankor(Html::Link("testdetail","create",array("test_id"=>$id_get)),"<span class=\"glyphicon glyphicon-plus-sign\"></span>
<span class=\"glyphicon-class  \"></span>","data-toggle=\"tooltip\" data-original-title=\"Добавить новую запись\""); ?></th><th style="width:10px">&nbsp </th></tr>
					<?php foreach ($tblTestDetail as $itm){ ?>
					<tr><td>
						<?php 
						echo /*Html::Ankor(Html::Link("testdetail","view",array("test_id"=>$itm["test_id"],"question_id"=>$itm["question_id"])),$itm["question_title"]);*/ $itm["question_title"]?>
						</td><td>
						<?php 
						echo Html::Ankor(Html::Link("testdetail","delete",array("test_id"=>$itm["test_id"],"question_id"=>$itm["question_id"])),"<span class=\"glyphicon glyphicon-remove\"></span><span class=\"glyphicon-class\"></span>","data-toggle=\"tooltip\" data-original-title=\"Удалить вопрос из теста\""); ?>
						</td>
						<?php/* 
						echo Html::Ankor(Html::Link("testdetail","edit",array("test_id"=>$itm["test_id"],"question_id"=>$itm["question_id"])),"<span class=\"glyphicon glyphicon-pencil\"></span><span class=\"glyphicon-class\">Корректировка</span>"); */?>
						
					</tr>

					<?php }  ?>
			</table>
        </div>
	</div>
</div>
<div class="container">
	<div class="row">
        <div class="col-md-12">
			<table class="table table-bordered">
				<tr><th>Ответ</th><th>Удаление</th><th>Корректировать</th></tr>
					<?php foreach ($tblDiscipline as $itm){ ?>
<tr><td><?php echo $itm["discipline_title"];?></td><td><span class="glyphicon glyphicon-remove"></span><span class="glyphicon-class">удалить</span></td><td><span class="glyphicon glyphicon-pencil"></span><span class="glyphicon-class">Корректировка</span></td></tr>
					<?php }  ?>
			</table>
        </div>
	</div>
</div>
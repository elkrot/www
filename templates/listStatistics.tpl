<div class="container">
	<div class="row">
        <div class="col-md-12">
			<table class="table table-bordered">
				<tr><th>Тест</th><th>Начало теста</th><th>Конец теста</th><th>Время теста</th><th>Оценка</th></tr>
					<?foreach ($tblStatistics as $itm){?>
						<tr>
						<td>
						<?php 
						echo $itm["test_title"]; ?>
						</td>
						<td>
						<?php 
						echo $itm["date_start"]; ?>
						</td><td>
						<?php 
						echo $itm["date_end"]; ?>
						</td><td>
						<?php 
						echo $itm["total_time"]; ?>
						</td>
						<td>
						<?php 
						echo $itm["rating"]; ?>
						</td>
						</tr>
					<?php } ?>
			</table>
        </div>
	</div>
</div>


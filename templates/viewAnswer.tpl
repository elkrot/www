<div class="container">
	<div class="row">
        <div class="col-md-12">
			<table class="table table-bordered">
				<tr><th>Ответ</th><th>Удаление</th><th>Корректировать</th></tr>
					<?foreach ($tblDiscipline as $itm){
								echo "<tr><td>".$itm["discipline_title"]."</td><td><span class=\"glyphicon glyphicon-remove\"></span><span class=\"glyphicon-class\">удалить</span></td>
								<td><span class=\"glyphicon glyphicon-pencil\"></span>
<span class=\"glyphicon-class\">Корректировка</span></td>
								</tr>";
					}    
					?>
			</table>
        </div>
	</div>
</div>
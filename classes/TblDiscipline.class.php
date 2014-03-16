<?php
 class TblDiscipline extends Table {
	public function __construct(){
		$sql="select * from discipline ";
		parent::__construct();
	}
}
?>
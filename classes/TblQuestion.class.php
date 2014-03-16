<?php
 class TblQuestion extends Table {
	public function __construct(){
		$sql="select * from discipline ";
		parent::__construct();
	}
}
?>
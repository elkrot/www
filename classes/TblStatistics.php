<?php
 class TblStatistics extends Table {
	public function __construct(){
		$sql="select * from statistics ";
		parent::__construct();
	}
}
?>
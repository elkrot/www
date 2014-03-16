<?php
 class TblTestDetail extends Table {
	public function __construct(){
		$sql="select * from test_detail ";
		parent::__construct();
	}
}
?>
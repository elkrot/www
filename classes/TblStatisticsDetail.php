<?php
 class TblStatisticsDetail extends Table {
	public function __construct(){
		$sql="select * from statistics_detail ";
		parent::__construct();
	}
}
?>
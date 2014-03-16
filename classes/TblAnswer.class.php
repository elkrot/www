<?php
 class TblAnswer extends Table {
	public function __construct(){
		$sql="select * from answer ";
		parent::__construct();
	}
}
?>
<?php
 class TblTopic extends Table {
	public function __construct(){
		$sql="select * from topic ";
		parent::__construct();
	}
}
?>
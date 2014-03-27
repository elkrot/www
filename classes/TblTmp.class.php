<?php
 class TblTmp extends Table {
	public function __construct($where="",$params=array(),$limit=""){
		$this->sql="select * from tmp where 1=1 ";
		parent::__construct($where,$params,$limit);
	}

}
?>
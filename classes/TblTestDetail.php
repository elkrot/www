<?php
/**
 * Класс TblTestDetail Класс Детали Тестов
 *
 *
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 */
 class TblTestDetail extends Table {
	public function __construct(){
		$sql="select * from test_detail ";
		parent::__construct();
	}
}
?>
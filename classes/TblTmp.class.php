<?php
/**
 * Класс TblTmp Класс Темповая таблица используется для загрузки данных
 *
 *
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 * @package Tables
 * @category Models
 */

/**
 * Класс TblTmp Класс Темповая таблица используется для загрузки данных
 *
 */
 class TblTmp extends Table {
 	/**
 	 * Конструктор 
 	 * 
 	 * @param string $where Условие отбора
 	 * @param array $params Параметры условий отбора
 	 * @param string $limit Лимит данных
 	 */
	public function __construct($where="",$params=array(),$limit="",$orderby=""){
		$this->sql="select * from tmp where 1=1 ";
		parent::__construct($where,$params,$limit,$orderby);
	}
	/**
	 * Экспорт данных
	 */
	public function ExportData()
	{
		foreach ( $this as $itm ) {
			$data = unserialize ( $itm ["data"] );		
			foreach ( $data as $dataitm ) {
				$is_right = $dataitm [4];
				$discipline_id = TblDiscipline::getIdByTitle ( $dataitm[0] );
				$topic_id = TblTopic::getIdByTitle ( $dataitm[1], $discipline_id );
				$question_id = TblQuestion::getIdByTitle ( $dataitm[2], $topic_id );
				$answer_id = TblAnswer::getIdByTitle ( $dataitm[3], $question_id, $is_right );
			}
		}
	}

}
?>
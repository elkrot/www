<?php
/**
 * Класс TestDataReader Сохранение закачаных данных
 *
 * Класс обеспечивающий сохранение промежуточных и постоянных данных
 *
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 */
class TestDataReader
{
	/**
	 * Стратегия
	 *
	 * @var ReaderStrategy Стратегия обработки файла с данными
	 *
	 * @access private
	 */
	private $strategy;
	/**
	 * База данных
	 *
	 * @var db Подключение к БД
	 *
	 * @access private
	 */	
	private $db;
	/**
	 * Конструктор
	 *
	 * @param ReaderStrategy Стратегия обработки файла с данными
	 * 
	 */	
	public function __construct ($strategy)
	{
		$this->strategy = $strategy;
	}
	/**
	 * Деструктор
	 *
	 * Уничтожение объекта стратегии
	 *
	 */
	public function __destruct()
	{
		unset($strategy);
	}
	/**
	 * __toString Отрисовка данных
	 *
	 */
	function __toString()
	{
		var_dump($this->strategy->getData());
	}
	/**
	 * saveTempData Сохранить временные данные
	 *
	 * @var string $extension расширение закачиваемого файла
	 *
	 * @var string $title Описание закачки
	 *
	 * @return integer Ид временных данных
	 * 
	 */	
	function saveTempData($extension,$title)
	{
		//Logger::getInstance()->log(serialize($this->strategy->getData()));
		$data = $this->strategy->getData();
		Database::getInstance()->query("insert into tmp (title,data,upload_date,count_records,extension,userid)values
		 (:title,:data,now(),:count_records,:extension,:userid)"
				,array(	":title"=>$title
						,":data"=>serialize($data)
						,":count_records"=>count($data)
						,":extension"=>$extension
						,":userid"=>Authentication::GetUserId()));
						$temp_id = Database::getInstance()->lastInsertId();
		
		return $temp_id;
	}
}
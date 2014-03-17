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
	 * renderData Отрисовка данных
	 *
	 */
	function renderData()
	{
		var_dump($this->strategy->getData());
	}
	/**
	 * saveTempData Сохранить временные данные
	 *
	 * @return integer Ид временных данных
	 * 
	 */	
	function saveTempData()
	{
		Logger::getInstance()->log(serialize($this->strategy->getData()));
		return $temp_id;
	}
	/**
	 * saveData Сохранение постоянных данных
	 *
	 */	
	function saveData()
	{
		Logger::getInstance()->log("save");
	}
}
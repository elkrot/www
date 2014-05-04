<?php
/**
 * Класс Table Базовый абстрактный Класс Таблиц данных
 *
 *
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 * @package Tables
 * @category Models
 */

/**
 * Класс Table Базовый абстрактный Класс Таблиц данных
 *
 */
abstract class Table implements Iterator {
 /**
 * Данные таблицы
 * @access private
 * @var array $_container
 */
private $_container=array();
/**
 * Текущая позиция курсора
 * @access protected
 * @var int $_position
 */
protected $_position = 0;
/**
 * SQL запрос
 * @access protected
 * @var string $sql
 */
protected $sql;
/**
 * Конструктор 
 * 
 * @param string $where дополнительное условие отбора данных
 * @param array $params параметры условия
 * @param string $limit значение Limit
 * @param string $order_by Сортировка
 */
	public function __construct($where="",$params=array(),$limit="",$order_by=""){
		$this->sql.=$where.$order_by.$limit;

		$this->_container=Database::getInstance()->query($this->sql,$params,PDO::FETCH_ASSOC);

		$this->_position = 0;
	}
	/**
	 * Деструктор
	 */
public function __destruct(){
	unset($this->_container);
}
/**
 * Вернуть данные
 * 
 * @return multitype:
 */
	public function GetData() {
		return $this->_container;
	}
	/**
	 * Реализация интерфейса Iterator
	 */
	public function rewind()
	{
		$this->_position = 0;
	}
	/**
	 * Реализация интерфейса Iterator
	 * @return multitype:
	 */
	public function current()
	{
		return $this->_container[$this->_position];
	}
	/**
	 * Реализация интерфейса Iterator
	 * @return number
	 */
	public function key()
	{
		return $this->_position;
	}
	/**
	 * Реализация интерфейса Iterator
	 */
	public function next()
	{
		++$this->_position;
	}
	/**
	 * Реализация интерфейса Iterator
	 * @return bool
	 */
	public function valid()
	{
		return isset($this->_container[$this->_position]);
	}
	 
}
?>
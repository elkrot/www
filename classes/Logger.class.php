<?php
/**
 * Класс Logger singleton класс ведения логов
 *
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 * @example Logger::getInstance()->log("message")
 * @package Utils
 * @category Logging
 */

require_once "./cnf/config.php";

/**
 * Класс Logger singleton класс ведения логов
 *
 */
class Logger {
	/**
	 * Instance of the database class
	 * 
	 * @access private
	 * @static Database $instance
	 */	
	private static $instance = NULL;
	/**
	 * Путь к Log файлу
	 * 
	 * @access private
	 * @static string $config_log_file
	 * 
	 */
	private static $config_log_file = CONFIG_LOG_FILE;
	/**
	 * Дескриптор файла
	 * 
	 * @access private
	 * @var $fp
	 *
	 */	
	private $fp;
	/**
	 * Вернуть singleton object Instance класса Logger
	 *
	 * @access private
	 * @static 
	 *
	 */	
	static function getInstance() {
		if (self::$instance == NULL) {
			self::$instance = new Logger ();
		}
		return self::$instance;
	}
	/**
	 * Конструктор
	 * 
	 *  @access private
	 * 
	 */
	private function __construct() {
		$this->open ();
	}
	/**
	 * Конструктор копирования
	 * 
	 *  @access private
	 *
	 */
	private function __clone() {
	}
	/**
	 * Открыть файл
	 *
	 *  @access private
	 *
	 */	
	private function open() {
		if (self::$config_log_file == null) {
			return;
		}
		
		if (is_file ( self::$config_log_file ) && file_exists ( self::$config_log_file )) {	
			$this->fp = fopen ( self::$config_log_file, 'a+' );
		}
	}
	/**
	 * Запись в файл
	 *
	 * @access private
	 *
	 */	
	private function _write($string) {
		fwrite ( $this->fp, $string );
	}
	/**
	 * Запись в файл  форматированной строки
	 *
	 * @access public
	 *
	 */	
	public function log($message) {
		if (! is_string ( $message )) {
			return;
		}
		$log = '';
		
		$log .= '[' . date ( 'D M d H:i:s Y', time () ) . '] ';
		
		$log .= $message;
		$log .= "\n";
		
		$this->_write ( $log );
	}
}

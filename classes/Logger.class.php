<?php
//Logger::getInstance()->log($itm."::".$matches[2]."::".$matches[3]);
require_once "./cnf/config.php";
class Logger {
	private static $instance = NULL;
	private static $config_log_file = CONFIG_LOG_FILE;
	private $fp;
	static function getInstance() {
		if (self::$instance == NULL) {
			self::$instance = new Logger ();
		}
		return self::$instance;
	}
	private function __construct() {
		$this->open ();
	}
	private function __clone() {
	}
	private function open() {
		if (self::$config_log_file == null) {
			return;
		}
		
		if (is_file ( self::$config_log_file ) && file_exists ( self::$config_log_file )) {	
			$this->fp = fopen ( self::$config_log_file, 'a+' );
		}
	}
	private function _write($string) {
		fwrite ( $this->fp, $string );
	}
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

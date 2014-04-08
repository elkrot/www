<?php
/**
 * Database access class.
 */
class Database {

	/**
	 * Instance of the database class
	 * @static Database $instance
	 */
	private static $instance;
	/**
	 * Database connection
	 * @access private
	 * @var PDO $connection
	 */
	private $connection;

	/**
	 * Constructor
	 * @param $dsn The Data Source Name. eg, "mysql:dbname=testdb;host=127.0.0.1"
	 * @param $username
	 * @param $password
	 */
	private function __construct(){
		$conf=parse_ini_file($_SERVER['DOCUMENT_ROOT']."/cnf/config.ini");
	
		$this->connection = new PDO("mysql:dbname=".$conf["dbname"].";host=".$conf["host"],$conf["user"],$conf["pass"],
				array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	/**
	 * Gets an instance of the Database class
	 *
	 * @static
	 * @return Database An instance of the database singleton class.
	 */
	public static function getInstance(){
		if(empty(self::$instance)){
			try{
				self::$instance = new Database();
			} catch (PDOException $e) {
				Logger::getInstance()->log('Connection failed: ' . $e->getMessage());
			}
		}
		return self::$instance;
	}

	/**
	 * Выполнить запрос используя текущее соединение с БД.
	 *
	 * @param string строка запроса
	 * @param array $args массив аргументов запроса array(":name" => "foo")
	 * @return array массив значений.
	 */
	public function query($query, array $args=null,$fetchmode=PDO::FETCH_ASSOC){
		$tokens = explode(" ",$query);
		
		try{
			$sth = $this->connection->prepare($query);
			if(empty($args)){
				$sth->execute();
			}
			else{
				$sth->execute($args);
			}

			if($tokens[0] == "select"||$tokens[0] == "show"){
				$sth->setFetchMode($fetchmode);
				$results = $sth->fetchAll();
				return $results;
			}
		} catch (PDOException $e) {
			Logger::getInstance()->log( 'Query failed: ' . $e->getMessage(). '<br />Query : ' . $query);
		}
		return 1;
	}

	/**
	 * Returns the last inserted ID
	 *
	 * @return int ID of the last inserted row
	 */
	public function lastInsertId(){
		return $this->connection->lastInsertId();
	}
	
	/**
	 * Получить строку параметров
	 *
	 * @param $params string
	 *        	id или массив доп параметров
	 *
	 * @return string
	 */
	static function GetParamStr($params) {
		$ret = "";
		if (is_array ( $params ) && (! empty ( $params ))) {
			
			foreach ( $params as $key => $value ) {
				$ret .= " and ".$key . "=:" . $key;
			}
		} elseif (is_int ( $params )) {
			$ret = ($params == "" ? "" : " and id=:id" );
		}
		return $ret;
	}
}
?>
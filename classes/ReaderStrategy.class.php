<?php
/**
* Класс ReaderStrategy Стратегия чтения 
*
* Абстрактный класс для родитель для классов стратегий чтения 
*
* @author Ф.И.О. <e-mail>
* @version 1.0
*/
abstract class ReaderStrategy
{
/**
* Путь к файлу
*
* @var string Строка
* 
* @access protected 
*/
    protected $file;
/**
* Размер файла
*
* @var integer 
*
* @access protected
*/
    protected $length;
/**
* Дескриптор файла
*
* @var string Строка
*
* @access protected
*/
    protected $handle; 
/**
* Данные
*
* @var array Строка
*
* @access protected
*/
    protected $data; 
    
/**
* Вернуть данные абстрактный метод
*
* @return array
*/
abstract function getData(); 
/**
 * Конструктор класса
 *
 * @param string $file путь к файлу
 */   
    public function __construct($file, $length = 8000) 
    { 
       $this->file = $file; 
       $this->length = $length; 
       $this->FileOpen(); 
    } 
    /**
     * Деструктор
     *
     */
    public function __destruct() 
    { 
       $this->FileClose(); 
    } 
    /**
     * Открытие файла
     *
     */
    private function FileOpen()
    {
        $this->handle=($this->IsFile())?fopen($this->file, 'r'):null;
    }
    /**
     * Закрытие файла
     *
     */
    private function FileClose()
    {
        if($this->handle) 
         @fclose($this->handle); 
    }
    /**
     * Получить размер файла
     *
     * @return integer
     */
    protected function GetSize()
    {
        if($this->IsFile())
            return (filesize($this->file));
        else
            return false;
    }
    /**
     * Проверка файла
     *
     * @return boolean
     */
    private function IsFile()
    {
        if(is_file($this->file) && file_exists($this->file)){
            return true;}
        else{
        	Logger::getInstance()->log($this->file);
            return false;
        }
    }
}

<?php
abstract class ReaderStrategy
{
    protected $file;
    protected $length;
    protected $handle; 
    protected $data; 
abstract function getData();    
    public function __construct($file, $length = 8000) 
    { 
       $this->file = $file; 
       $this->length = $length; 
       $this->FileOpen(); 
    } 
    public function __destruct() 
    { 
       $this->FileClose(); 
    } 
    
    private function FileOpen()
    {
        $this->handle=($this->IsFile())?fopen($this->file, 'r'):null;
    }
    private function FileClose()
    {
        if($this->handle) 
         @fclose($this->handle); 
    }
    protected function GetSize()
    {
        if($this->IsFile())
            return (filesize($this->file));
        else
            return false;
    }
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

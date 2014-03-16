<?php
class CsvReader
{ 
    private $file;
    private $delimiter; 
    private $length;
    private $handle; 
    private $csvArray; 
    
    public function __construct($file, $delimiter=";", $length = 8000) 
    { 
       $this->file = $file; 
       $this->length = $length; 
       $this->delimiter = $delimiter; 
       $this->FileOpen(); 
    } 
    public function __destruct() 
    { 
       $this->FileClose(); 
    } 
    public function GetCsv()
    {
        $this->SetCsv();
        if(is_array($this->csvArray)) 
         return $this->csvArray;
    }
    
    private function SetCsv()
    {
	$i=0;
        if($this->GetSize())
        {
            while (($data = @fgetcsv($this->handle, $this->length, $this->delimiter)) !== FALSE)
            {
			
			foreach ($data as $item){
			$cp1251toUtf8=iconv("CP1251", "UTF-8//IGNORE",$item);
			$this->csvArray[$i][]= $cp1251toUtf8;
			}
              $i++; 
            }
        }
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
    private function GetSize()
    {
        if($this->IsFile())
            return (filesize($this->file));
        else
            return false;
    }
    private function IsFile()
    {
        if(is_file($this->file) && file_exists($this->file))
            return true;
        else
            return false;
    }
}
?>
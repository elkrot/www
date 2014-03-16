<?php
class CsvWriter
{
    private $file;
    private $delimiter;
    private $array;
    private $handle;
    public function __construct($file, $array, $delimiter=";")
    {
        $this->file = $file; 
        $this->array = $array; 
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
    }
    
    private function IsWritable()
    {
        if(is_writable($this->file))
            return true;
        else
            return false;
    }
    private function SetCsv() 
    { 
      if($this->IsWritable())
      {
          $content = ""; 
          foreach($this->array as $ar) 
          { 
             $content .= implode($this->delimiter, $ar);
             $content .= "\r\n"; 
          } 
          if (fwrite($this->handle, $content) === FALSE) 
                 exit;
      }
    }
    private function FileOpen()
    {
        $this->handle=fopen($this->file, 'w+');
    }
    private function FileClose()
    {
        if($this->handle) 
         @fclose($this->handle); 
    } 
}
//$array = array(array('������','1','1'), array('2','2','2'), array('3','3','3'));
//$dd = new CsvWriter('test.txt',$array);
//$dd->GetCsv();
?>
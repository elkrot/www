<?php

class CsvFileReaderStrategy extends ReaderStrategy
{
public function getData()
    {
	$i=0;
	
        if($this->GetSize())
        {
        	
            while (($data = @fgetcsv($this->handle, $this->length,";")) !== FALSE)
            {
            	
			foreach ($data as $item){
			$cp1251toUtf8=iconv("CP1251", "UTF-8//IGNORE",$item);
			$this->data[$i][]= $cp1251toUtf8;
			}
              $i++; 
            }
        }
        if(is_array($this->data)) 
         return $this->data;
    }
    
}
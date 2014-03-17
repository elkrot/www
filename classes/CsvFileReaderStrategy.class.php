<?php
/**
 * Класс CsvFileReaderStrategy Конкретный класс стратегии обработки данных csv файлов
 *
 * Класс стратегии обработки данных
 *
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 */
class CsvFileReaderStrategy extends ReaderStrategy
{
	/**
	 * Получить данные из файла
	 *
	 * @return array
	 */	
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
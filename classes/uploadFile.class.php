<?php

 class  uploadFile 
{
	public static function uploadData()
	{
	$temp_id = 0;
	$ret = true;
	    if (isset($_FILES)&&is_array($_FILES)&&count($_FILES)>0)
		{
			if($_FILES["filename"]["size"] > 1024*4*1024)
				{
					Logger::getInstance()->log ("Размер файла превышает 4 мегабайта");
					$ret = false;
				}
				
				
			if (!($_FILES['filename']['type'] =="text/plain" ||$_FILES['filename']['type'] =="text/csv") && $ret )
				{
					Logger::getInstance()->log ("Не верный формат файла ".$_FILES['filename']['type']);
					$ret = false;				
				}
			
			if(is_uploaded_file($_FILES["filename"]["tmp_name"]) && $ret )
				{
					$filePath= "temp.csv";
					move_uploaded_file($_FILES["filename"]["tmp_name"], $filePath);
					$fileName = $_FILES["filename"]["name"];
					$extension = self::getExtension($fileName);
					
					if ($extension =="txt")
					{
						$testReader = new TestDataReader(new TxtFileReaderStrategy($filePath));
					}
					elseif ($extension =="csv")
					{
						$testReader = new TestDataReader(new CsvFileReaderStrategy($filePath));
					}else
					{
						return 0;
					}
					$temp_id = $testReader->saveTempData();
					
					unlink($filePath);
				}	
		}
		return $temp_id;
	}
	
	
     public static function getExtension($filename) {
        //$path_info = pathinfo($filename);
        return pathinfo($filename, PATHINFO_EXTENSION);;
      }

}
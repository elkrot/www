<?php
class TxtFileReaderStrategy extends ReaderStrategy
{
public function getData()
    {
		if ($this->handle) {
			while (($buffer = fgets($this->handle, 4096)) !== false) {
				$ar = $this->get_level($buffer);
				$new_lvl = $ar[0];
				
				if ($new_lvl == 1){
					$discipline = $ar[2];
				}elseif ($new_lvl == 2){
					$topic = $ar[2];
				}elseif ($new_lvl == 3){
					$question = $ar[2];
				}elseif ($new_lvl == 4){
					$answer = $ar[2];
				}			
				if (($new_lvl<=$old_lvl)&&($new_lvl!=0)){
					$this->data[] = array ($discipline ,$topic ,$question ,$answer,$ar[1]);
				}
				$old_lvl=$new_lvl;
			}
			if (!feof($this->handle)) {
				echo "Ошибка чтения файла\n";
			}
			
		}
		 if(is_array($this->data)) 
			return $this->data;
	}
	
	function get_level($stroka)
	{
		$ar = array("Дисциплина"=>1,"Тема"=>2,"Вопрос"=>3,"Ответ"=>4);
		foreach ($ar as $key=>$itm) {
					$pattern = "/^\[(".$key.")(\+?)\]:(.*|\s*)$/i";
					preg_match( $pattern, $stroka, $matches );
					
					if ($matches[1]==$key)
					{
						return array($itm,$matches[2],$matches[3]);
					}
		}
return array();
		
	}
	
}
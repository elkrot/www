<?php
/**
 * Класс Html Статический класс для формирования html элементов
 *
 *
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 */
class Html {
	/**
	 * Получить адрес ссылки
	 *
	 * @param $target string
	 *        	Цель действия
	 *        	
	 * @param $action string
	 *        	действие
	 *        	
	 * @param $params string
	 *        	id или массив доп параметров
	 *        	
	 * @return string
	 */
	static function Link($target = "", $action = "", $params = array()) {
		if ($target == "" && $action == "" && empty ( $params )) {
			$param_str = "";
		} else {
			$param_str = "?" . ($target == "" ? "" : "target=" . $target . 
					($action == "" ? "" : "&action=" . $action . self::GetParamStr ( $params )));
		}
		
		return SERVER_NAME_URL . $param_str;
	}
	/**
	 * Получить Html элемент anchor
	 *
	 * @param $link string
	 *        	Цель действия
	 *        	
	 * @param $title string
	 *        	действие
	 *        	
	 * @return string
	 */
	static function Ankor($link, $title, $add="") {
		return "<a href=\"" . $link . "\"  ".$add.">" . $title . "</a>";
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
				$ret .="&". $key . "=" . $value;
			}
		} elseif (is_int ( $params )) {
			
			$ret = ($params == "" ? "" : "&id=" . ( int ) $params);
		}
		
		return $ret;
	}
	static function Select($target, $keySelected="",$params=array(),$where="") {
		$nclass = "Tbl" . ucfirst ( $target );
		if (is_subclass_of ( $nclass, 'IHtmlHelpers' )) {
			$data = $nclass::GetDataForSelect($params,$where);
		//	$data = call_user_func(array($nclass,"GetDataForSelect"),$params,$where);
			$ret = "<select class=\"form-control\" name=\"" . $target . "_select\">";
			//$ret .="<option disabled>Выберите значение</option>";
			
			foreach ($data as $key => $value) {
				$ret .= "<option  value=\"".$key."\" ".($keySelected==$key?" selected":"")." >".$value."</option>";	
			}

			$ret .= "</select>";
		}
		return $ret;
	}
	
	public static function Hidden($target="",$value=""){
		return "<input hidden name=\"hidden_".$target."\" value=\"".$value."\" >";
	}
	
	public static function Checkbox($target,$value,$html_class=""){
		return "<input type=\"checkbox\" 
				".(!empty($value)?"checked":"")."
				name=\"check_box_".$target."\" value=\"+\" class=\"".$html_class."\">";
	}
}
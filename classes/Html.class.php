<?php
/**
 * Класс Html Статический класс для формирования html элементов
 *
 *
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 * @package Utils
 * @category Html
 */

/**
 * Класс Html Статический класс для формирования html элементов
 *
 */
class Html {
	/**
	 * Получить адрес ссылки
	 *
	 * @param string $target
	 *        	Цель действия
	 *        	
	 * @param string $action
	 *        	действие
	 *        	
	 * @param string $params
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
	 * @param string $link
	 *        	Цель действия
	 *        	
	 * @param string $title
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
	 * @param string $params
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
	/**
	 * Получить HTML разметку для элемента select
	 *
	 * @param string $target наименование таблицы
	 * 
	 * @param string $keySelected значение выбора
	 * 
	 * @param array $params параметры для отбора данных
	 * 
	 * @param string $where доп условие отбора данных
	 *
	 * @return string
	 * 
	 * @static
	 */
	static function Select($target, $keySelected="",$params=array(),$where="") {
		$nclass = "Tbl" . ucfirst ( $target );
		if (is_subclass_of ( $nclass, 'IHtmlHelpers' )) {
			$data = $nclass::GetDataForSelect($params,$where);
		//	$data = call_user_func(array($nclass,"GetDataForSelect"),$params,$where);
			$ret = "<select class=\"form-control\" name=\"" . $target . "_select\">";
			//$ret .="<option disabled>Выберите значение</option>";
			
			foreach ($data as $key => $value) {
				$ret .= "<option  value=\"".$key."\" ".($keySelected==$key?" selected=\"selected\"":"")." >".$value."</option>";	
			}

			$ret .= "</select>";
		}
		return $ret;
	}
	/**
	 * Получить HTML разметку для элемента Hidden
	 *
	 * @param string $target наименование таблицы 
	 * 
	 * @param string $value значение
	 *
	 * @return string
	 */	
	public static function Hidden($target="",$value=""){
		return "<input hidden name=\"hidden_".$target."\" value=\"".$value."\" >";
	}
	/**
	 * Получить HTML разметку для элемента Checkbox
	 *
	 * @param string $target наименование таблицы
	 *
	 * @param string $value значение
	 * 
	 * @param string $html_class css класс
	 *
	 * @return string
	 */	
	public static function Checkbox($target,$value,$html_class=""){
		return "<input type=\"checkbox\" 
				".(!empty($value)?"checked":"")."
				name=\"check_box_".$target."\" value=\"+\" class=\"".$html_class."\">";
	}
}
<?php
/**
 * Интерфейс IHtmlHelpers 
 *
 *
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 * @package Utils
 * @category Html
 */

/**
 * Интерфейс IHtmlHelpers
 *
 */
 interface IHtmlHelpers
{
	/**
	 * GetDataForSelect Вернуть данные для выбора
	 *
	 * @param array $params расширение закачиваемого файла
	 *
	 * @param string $where Описание закачки
	 *
	 */
	public static function GetDataForSelect($params,$where);
	
}
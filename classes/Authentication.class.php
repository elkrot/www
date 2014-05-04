<?php
/**
 * Класс Authentication Аутентификация пользователя на сайте
 *
 * Класс обеспечивающий Аутентификацию пользователей
 *
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 * @package Authentication
 */

/**
 * Класс обеспечивающий Аутентификацию пользователей
 */
 class  Authentication {
 	/**
 	 * Вернуть ИД Юзера
 	 * 
 	 * @static
 	 * 
 	 * @return int Ид Юзера
 	*/
	static function getUserId() {
		return 1;
	}
	/**
	 * Вернуть Имя Юзера
	*
	* @static
	*
	* @return string Имя Юзера
	*/
	static function getUserName(){
		return "User";
	}
	/**
	 * Является ли пользователь администратором
	*
	* @static
	*
	* @return bool 
	*/
	static function isAdmin() {
		return true;
	}
	/**
	 * Авторизован ли пользователь
	*
	* @static
	*
	* @return int Ид Юзера
	*/
	static function isUser() {
		return self::getUserId()>0;
	}
}
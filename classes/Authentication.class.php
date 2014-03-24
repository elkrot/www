<?php
/**
 * Класс Authentication Аутентификация пользователя на сайте
 *
 * Класс обеспечивающий загрузку файла
 *
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 */
 class  Authentication {
	static function getUserId() {
		return 1;
	}
	
	static function isAdmin() {
		return true;
	}
	
	static function isUser() {
		return self::getUserId()>0;
	}
}
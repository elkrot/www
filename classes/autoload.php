<?php
/**
 * Автозагрузчик классовы
 *
 * @package Main
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 */
spl_autoload_register('autoload');
    /*function autoload($class_name)    {
	if (file_exists($_SERVER['DOCUMENT_ROOT']."/classes/$class_name.class.php")){
    require_once($_SERVER['DOCUMENT_ROOT']."/classes/$class_name.class.php");}
    define('__ROOT__', dirname(dirname(__FILE__)));
}*/
function autoload($class_name)    {
    if (file_exists($_SERVER['DOCUMENT_ROOT']."/classes/$class_name.class.php")){
    require_once($_SERVER['DOCUMENT_ROOT']."/classes/$class_name.class.php");}
	
}
/*
function autoload($class_name)    {
    if (file_exists("/home/a6069379/public_html/classes/$class_name.class.php")){
    require_once("/home/a6069379/public_html/classes/$class_name.class.php");}
}*/
?>
<?php
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
?>
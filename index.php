<?php

require_once "./classes/autoload.php";
require_once "./cnf/config.php";
$action = isset ( $_GET ["action"] ) ? htmlspecialchars ( $_GET ["action"] ) : "";
$target = isset ( $_GET ["target"] ) ? htmlspecialchars ( $_GET ["target"] ) : "";
$temp_id = isset ( $_GET ["temp_id"] ) ? ( int ) $_GET ["temp_id"] : 0;
$actions = array('list', 'view', 'edit','delete','import','create','goto','start','finish');
$targets = array("tmp","discipline","question","answer","topic","test","testdetail");

if (is_array($targets)&&in_array($target, $targets)){
	require_once "./includes/".$target."Controller.php";
}


require_once "./templates/index.tpl";
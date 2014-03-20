<?php 
require_once "./classes/autoload.php";
$temp_id = uploadFile::uploadData();

if ($temp_id>0)
{
	header( 'Location: http://'.$_SERVER["SERVER_NAME"].'/?temp_id='.$temp_id );
}

require_once "./templates/index.tpl";
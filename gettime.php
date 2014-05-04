<?php  
/**
 *
 * Файл передачи времени теста во время его выполнения
 *
 * @package Main
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 *
 */
session_start();
include_once './cnf/config.php';
if (!isset($_SESSION["start_time"]))  {
	$_SESSION["start_time"]=time();}
$seconds = $_SESSION["start_time"]+TIME_TO_TEST-time();

$h=floor($seconds/3600);
$m=floor(($seconds%3600)/60);
$s=($seconds%3600)%60;
echo  $h.':'.$m.':'.$s; 
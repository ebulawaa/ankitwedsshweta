<?php
session_start();
require_once ('MysqliDb.php');
//$db = new MysqliDb ('localhost', 'root', 'techno', 'wish');
$db = new MysqliDb ('localhost', 'ebulad4i_wedexp2', '8tyH(w8psVR$', 'ebulad4i_weddingexp2');
define('HTTP_SERVER', 'http://'.$_SERVER['HTTP_HOST']);
define('DIR_FRONT_END', '/wish/');
define('APPLICATION_URL',HTTP_SERVER.DIR_FRONT_END);
error_reporting(0);
?>
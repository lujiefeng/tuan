<?php
if(!defined('ROOT_PATH'))
	define('ROOT_PATH', str_replace('api/soso.php', '', str_replace('\\', '/', __FILE__)));
$_REQUEST['a'] = 'soso';
include_once(ROOT_PATH."api.php");
?>
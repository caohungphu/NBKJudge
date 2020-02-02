<?php //Code by Hung Phu - Update 5/10/2019
	header('Content-Type: text/html; charset=UTF-8');
	$db_host = "localhost"; // Giữ mặc định là localhost
	$db_name	= 'chambaitructuyen';// Can thay doi
	$db_username	= 'admin'; //Can thay doi
	$db_password	= 'admin'; //Can thay doi
	$db_connect = new mysqli($db_host, $db_username, $db_password, $db_name);
	if ($db_connect->connect_error) { die("Không thể kết nối: " . $db_connect->connect_error); }
	error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
?>
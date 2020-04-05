<?php //Code by Hung Phu - Update 03/04/2020
	date_default_timezone_set("Asia/Bangkok"); 
	header('Content-Type: text/html; charset=UTF-8');
	//Connect SQL
	$db_host = "localhost"; //Host
	$db_name	= 'chambaitructuyen';// Database
	$db_username	= 'admin'; // User
	$db_password	= 'admin'; // Password
	$db_connect = new mysqli($db_host, $db_username, $db_password, $db_name);
	if ($db_connect->connect_error) { die("Không thể kết nối: " . $db_connect->connect_error); }
	error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
?>
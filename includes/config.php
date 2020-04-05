<?php //Code by Hung Phu - Update 03/04/2020
	require_once("connect.php"); 
	//Setting from SQL
	$hp_main_sql_query = "SELECT * FROM caidat WHERE id='1'";
	$hp_main_get_setting = $db_connect->query($hp_main_sql_query); 
	$hp_main_setting = $hp_main_get_setting->fetch_assoc();
	$hp_main_table = $hp_main_setting['cosodulieu'];
	$hp_main_sql_query_2 = "SELECT * FROM data WHERE tentable='{$hp_main_table}'"; 	
	$hp_main_get_data_setting = $db_connect->query($hp_main_sql_query_2); 
	$hp_main_data_setting = $hp_main_get_data_setting->fetch_assoc();
	
	//Information
	//-> Judge
	$hp_main_info_name_code = "NBK";
	$hp_main_info_name = "NBK Judge";
	$hp_main_info_name_2 = "Chấm bài trực tuyến";
	//-> School
	$hp_main_info_name_school = "NBK High School for the gifted - Vinh Long province";
	$hp_main_info_name_school_vi = "THPT Chuyên Nguyễn Bỉnh Khiêm - Tỉnh Vĩnh Long";
	$hp_main_info_school_logo = "img/logo.png";
	//-> Other
	$hp_main_info_description = $hp_main_info_name." - ".$hp_main_info_name_2." - ".$hp_main_info_name_school;
	
	//Data contest
	$hp_main_contest_folder = $hp_main_data_setting['teacher_folder'];
	$hp_main_contest_dir_submit = 'NBK_Contests/'.$hp_main_contest_folder.'/THUMUCNOPBAI/'; 
	$hp_main_contest_dir_logs = 'NBK_Contests/'.$hp_main_contest_folder.'/THUMUCNOPBAI/Logs/'; 
	$hp_main_contest_dir_tests = 'NBK_Contests/'.$hp_main_contest_folder.'/THUMUCTEST/'; 
	$hp_main_contest_dir_tests_zip = 'NBK_Contests/'.$hp_main_contest_folder.'/THUMUCTESTZIP/';
	$hp_main_contest_dir_files = 'NBK_Contests/'.$hp_main_contest_folder.'/THUMUCSHAREFILE/'; 
	$hp_main_contest_dir_tmp_files = 'NBK_Contests/'.$hp_main_contest_folder.'/THUMUCTAM/'; 
	$hp_main_contest_dir_contest = 'NBK_Contests/'.$hp_main_contest_folder.'/'; 
	$hp_main_contest_dir_backup = 'NBK_Contests/BACKUP/';
	$hp_main_contest_dir_root = 'NBK_Contests/';
	$hp_main_default_pass_user = '202cb962ac59075b964b07152d234b70'; //Pass la 123
	
	//Time contest
	$hp_main_time_start = $hp_main_data_setting['timestart'];
	$hp_main_time_finish = $hp_main_data_setting['timefinish'];	
	$hp_main_time_start_convert = date('H:i:s - m/d/Y', strtotime($hp_main_time_start));
	$hp_main_time_finish_convert = date('H:i:s - m/d/Y', strtotime($hp_main_time_finish));
	$hp_main_time_start_convert_str = strtotime($hp_main_time_start);
	$hp_main_time_finish_convert_str = strtotime($hp_main_time_finish);
	$hp_main_time_hours = intval(($hp_main_time_finish_convert_str - $hp_main_time_start_convert_str)/3600);
	$hp_main_time_mins = intval((($hp_main_time_finish_convert_str - $hp_main_time_start_convert_str)%3600)/60);	
?>
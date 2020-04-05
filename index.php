<?php //Code by Hung Phu - Update 02/04/2020
	include_once("includes/config.php");
	if($_GET) $_POST = $_GET;
	if(!isset($_GET["NBKJudge"])){$_GET["NBKJudge"]='';}
	//Header
	switch($_GET["NBKJudge"])
	{
		default:{ //Trang chu
			$hp_title = "Trang chủ - ".$hp_main_info_name." - ".$hp_main_info_name_2." - ".$hp_main_info_name_school_vi;
			include_once("home.php");
			break;
		}	
		case "rank":{ //Bang xep hang
			$hp_title = "Bảng xếp hạng - ".$hp_main_info_name." - ".$hp_main_info_name_2." - ".$hp_main_info_name_school_vi;
			include_once("rank.php");
			break;
		}
		case "rankv2":{ //Bang xep hang v2
			$hp_title = "Bảng xếp hạng version 2 - ".$hp_main_info_name." - ".$hp_main_info_name_2." - ".$hp_main_info_name_school_vi;
			include_once("rankv2.php");
			break;
		}
		case "about":{ //Thong tin
			$hp_title = "Thông tin - ".$hp_main_info_name." - ".$hp_main_info_name_2." - ".$hp_main_info_name_school_vi;
			include_once("about.php");
			break;
		}
		case "submit":{ //Nop bai
			$hp_title = "Nộp bài - ".$hp_main_info_name." - ".$hp_main_info_name_2." - ".$hp_main_info_name_school_vi;
			include_once("submit.php");
			break;
		}
		case "document":{ //Tai lieu
			$hp_title = "Tài liệu - ".$hp_main_info_name." - ".$hp_main_info_name_2." - ".$hp_main_info_name_school_vi;
			include_once("document.php");
			break;
		}
		case "tests":{ //Files test
			$hp_title = "File tests - ".$hp_main_info_name." - ".$hp_main_info_name_2." - ".$hp_main_info_name_school_vi;
			include_once("tests.php");
			break;
		}
		case "history":{ //File logs
			$hp_title = "Lịch sử chấm bài - ".$hp_main_info_name." - ".$hp_main_info_name_2." - ".$hp_main_info_name_school_vi;
			include_once("history.php");
			break;
		}
		case "profile":{ //Chinh sua thong tin
			$hp_title = "Chỉnh sửa thông tin - ".$hp_main_info_name." - ".$hp_main_info_name_2." - ".$hp_main_info_name_school_vi;
			include_once("profile.php");
			break;
		}
		case "login":{ //Dang nhap
			$hp_title = "Đăng nhập - NBK Judge - ".$hp_main_info_name." - ".$hp_main_info_name_2." - ".$hp_main_info_name_school_vi;
			include_once("login.php");
			break;
		}
		case "register":{ //Dang ki
			$hp_title = "Đăng kí - ".$hp_main_info_name." - ".$hp_main_info_name_2." - ".$hp_main_info_name_school_vi;
			include_once("register.php");
			break;
		}
		case "logout":{ //Dang xuat
			$hp_title = "Đăng xuất - ".$hp_main_info_name." - ".$hp_main_info_name_2." - ".$hp_main_info_name_school_vi;
			include_once("logout.php");		
			break;
		}
		case "admin":{ //Bang dieu khien admin
			$hp_title = "Bảng điều khiển - ".$hp_main_info_name." - ".$hp_main_info_name_2." - ".$hp_main_info_name_school_vi;
			include_once("admin.php");
			break;
		}
		case "listmember":{ //Danh sach user
			$hp_title = "Danh sách user - ".$hp_main_info_name." - ".$hp_main_info_name_2." - ".$hp_main_info_name_school_vi;
			include_once("listmember.php");
			break;
		}
	}
?>
<?php //Code by Hung Phu - Update: 5/10/2019
	if($_GET) $_POST = $_GET;
	if(!isset($_GET["NBKJudge"])){$_GET["NBKJudge"]='';}
	//Header
	switch($_GET["NBKJudge"])
	{
		default:{ //Trang chu
			$hp_title = "Trang chủ - NBK Judge - Chấm bài trực tuyến - NBK High School for the gifted";
			include_once("home.php");
			break;
		}	
		case "rank":{ //Bang xep hang
			$hp_title = "Bảng xếp hạng - NBK Judge - Chấm bài trực tuyến - NBK High School for the gifted";
			include_once("rank.php");
			break;
		}
		case "rankv2":{ //Bang xep hang v2
			$hp_title = "Bảng xếp hạng version 2 - NBK Judge - Chấm bài trực tuyến - NBK High School for the gifted";
			include_once("rankv2.php");
			break;
		}
		case "about":{ //Thong tin
			$hp_title = "Thông tin - NBK Judge - Chấm bài trực tuyến - NBK High School for the gifted";
			include_once("about.php");
			break;
		}
		case "submit":{ //Nop bai
			$hp_title = "Nộp bài - NBK Judge - Chấm bài trực tuyến - NBK High School for the gifted";
			include_once("includes/header.php");
			include_once("submit.php");
			break;
		}
		case "document":{ //Tai lieu
			$hp_title = "Tài liệu - NBK Judge - Chấm bài trực tuyến - NBK High School for the gifted";
			include_once("document.php");
			break;
		}
		case "tests":{ //Files test
			$hp_title = "File tests - NBK Judge - Chấm bài trực tuyến - NBK High School for the gifted";
			include_once("tests.php");
			break;
		}
		case "history":{ //File logs
			$hp_title = "Lịch sử chấm bài - NBK Judge - Chấm bài trực tuyến - NBK High School for the gifted";
			include_once("history.php");
			break;
		}
		case "profile":{ //Chinh sua thong tin
			$hp_title = "Chỉnh sửa thông tin - NBK Judge - Chấm bài trực tuyến - NBK High School for the gifted";
			include_once("profile.php");
			break;
		}
		case "login":{ //Dang nhap
			$hp_title = "Đăng nhập - NBK Judge - Chấm bài trực tuyến - NBK High School for the gifted";
			include_once("login.php");
			break;
		}
		case "register":{ //Dang ki
			$hp_title = "Đăng kí - NBK Judge - Chấm bài trực tuyến - NBK High School for the gifted";
			include_once("register.php");
			break;
		}
		case "logout":{ //Dang xuat
			$hp_title = "Đăng xuất - NBK Judge - Chấm bài trực tuyến - NBK High School for the gifted";
			include_once("logout.php");		
			break;
		}
		case "admin":{ //Bang dieu khien admin
			$hp_title = "Bảng điều khiển - NBK Judge - Chấm bài trực tuyến - NBK High School for the gifted";
			include_once("admin.php");
			break;
		}
	}
?>
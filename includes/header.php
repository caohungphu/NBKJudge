﻿<?php //Code by Hung Phu - Update 03/04/2020
	session_start();
	require_once("config.php"); 
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Favicon-->
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
	<!-- Title -->
    <title><?php echo $hp_title; ?></title>
    <meta name="description" content="<?php echo $hp_main_info_description; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
	<link href="css/toastr.css" rel="stylesheet"/>
	<!-- Custom js - for your changes-->
	<script type="text/javascript" src="js/alert.js"></script>
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/toastr.js"></script>
    <!-- Tweaks for older IEs-->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]
	-->
  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="<?php echo $hp_main_info_school_logo; ?>" alt="logo" class="img-fluid rounded-circle">
            <h2 class="h5"><?php echo $hp_main_info_name; ?></h2><span><?php echo $hp_main_info_name_2; ?></span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.php" class="brand-small text-center"><strong class="text-primary"><?php echo $hp_main_info_name_code; ?></strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->	
		<div class="main-menu">
          <h5 class="sidenav-heading">MAIN MENU</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li <?php if (($_GET["NBKJudge"])==""){echo 'class="active"';} ?>>
				<a href="./"><i class="fa fa-home" aria-hidden="true"></i>Trang chủ</a>
			</li>
			<li <?php if (($_GET["NBKJudge"])=="rank"){echo 'class="active"';} ?>>
				<a href="./?NBKJudge=rank"> <i class="fa fa-bar-chart" aria-hidden="true"></i>Bảng xếp hạng</a>
			</li>
			<li <?php if (($_GET["NBKJudge"])=="rankv2"){echo 'class="active"';} ?>>
				<a href="./?NBKJudge=rankv2"> <i class="fa fa-line-chart" aria-hidden="true"></i>Bảng xếp hạng V2</a>
			</li>
            <li <?php if (($_GET["NBKJudge"])=="about"){echo 'class="active"';} ?>>
				<a href="./?NBKJudge=about"><i class="fa fa-address-card" aria-hidden="true"></i></i>Thông tin</a>
			</li>
<!--PHP Menus-->			
<?php 
if (!isset($_SESSION['user_id']) || !$_SESSION['user_id']){
	//Dang nhap
	echo '<li '; if (($_GET["NBKJudge"])=="login") echo 'class="active"';
	echo '><a href="./?NBKJudge=login"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập</a></li>';
	//Dang ki
	echo '<li '; if (($_GET["NBKJudge"])=="register") echo 'class="active"';
	echo '><a href="./?NBKJudge=register"><i class="fa fa-user-plus" aria-hidden="true"></i>Đăng kí</a></li>'; 
	echo '</ul></div>';	
} else {
	//Lay thong tin user
	$hp_user_id = intval($_SESSION['user_id']); 
	$hp_sql_query = "SELECT * FROM {$hp_main_table} WHERE id='{$hp_user_id}'"; 
	$hp_get_member = $db_connect->query($hp_sql_query); 
	$hp_member = $hp_get_member->fetch_assoc();
	//Nop bai
	echo '<li '; if (($_GET["NBKJudge"])=="submit"){echo 'class="active"';} 
	echo '><a href="./?NBKJudge=submit"><i class="fa fa-desktop" aria-hidden="true"></i>Nộp bài</a></li>';
	//Tai lieu
	echo '<li '; if (($_GET["NBKJudge"])=="document"){echo 'class="active"';}
	echo '><a href="./?NBKJudge=document"><i class="fa fa-file" aria-hidden="true"></i> Tài liệu</a></li>';
	//Files test
	echo '<li '; if (($_GET["NBKJudge"])=="tests"){echo 'class="active"';} 
	echo '><a href="./?NBKJudge=tests"><i class="fa fa-book" aria-hidden="true"></i>Tests</a></li>';
	//Lich su cham bai
	echo '<li '; if (($_GET["NBKJudge"])=="history"){echo 'class="active"';} 
	echo '><a href="./?NBKJudge=history"><i class="fa fa-history" aria-hidden="true"></i>Lịch sử chấm bài</a></li>';
	//Chinh sua thong tin
	echo '<li '; if (($_GET["NBKJudge"])=="profile"){echo 'class="active"';} 
	echo '><a href="./?NBKJudge=profile"><i class="fa fa-wrench" aria-hidden="true"></i>Sửa thông tin</a></li>';
	//Dang xuat
	echo '<li><a href="./?NBKJudge=logout"><i class="fa fa-sign-out"></i>Đăng xuất</a></li>';
	//End Main Menus
	echo '</ul></div>';
	//Admin Panel
	if ($_SESSION['user_admin'] == 1){
			//Begin Admin Menu
			echo '<div class="admin-menu">';
			echo '<h5 class="sidenav-heading">ADMIN MENU</h5>';
			echo '<ul id="side-admin-menu" class="side-menu list-unstyled">'; 
			// Add User
			echo '<li '; if (($_GET["NBKJudge"])=="register"){echo 'class="active"';} 
			echo '><a href="./?NBKJudge=register"><i class="fa fa-user-plus" aria-hidden="true"></i>Add user</a></li>';	
			//Danh sach thanh vien
			echo '<li '; if (($_GET["NBKJudge"])=="listmember"){echo 'class="active"';} 
			echo '><a href="./?NBKJudge=listmember"><i class="fa fa-list-ol" aria-hidden="true"></i>Danh sách user</a></li>';	
			//Admin Panel
			echo '<li '; if (($_GET["NBKJudge"])=="admin"){echo 'class="active"';}
			echo '><a href="./?NBKJudge=admin"><i class="fa fa-shield" aria-hidden="true"></i>Bảng điều khiển</a></li>';
			//End admin menu
			echo '</ul></div>';	
	}
}
?>
          </ul>
        </div>
      </div>
    </nav>
    <div class="page">
      <!-- navbar -->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                  <div class="brand-text d-none d-md-inline-block"><span>&nbsp;&nbsp;&nbsp;</span><strong class="text-primary"><?php echo $hp_main_info_name; ?></strong></div></div>
			  <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
				<!-- Time -->
				<script type="text/javascript" src="js/date_time.js"></script>
				<li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><i class="fa fa-clock-o" aria-hidden="true"></i> 
					<span id="date_time" class="d-none d-sm-inline-block"></span></a>
<!-- Count Time Nop Bai-->
<?php
if ($hp_main_data_setting['timecount'] == 1){
$hp_time_contest =  date('d M Y H:i:s', strtotime($hp_main_time_finish));
$hp_time_start =  date('H:i:s - d/m/Y', strtotime($hp_main_time_start));
$hp_time_finish =  date('H:i:s - d/m/Y', strtotime($hp_main_time_finish));
print <<<EOF
<script>
var countDownDate = new Date("{$hp_time_contest}").getTime();
var x = setInterval(function() {
  var now = new Date().getTime();
  var distance = countDownDate - now;
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  document.getElementById("date_time").innerHTML = "Thời gian còn lại: " + days + " ngày " + hours + " giờ " + minutes + " phút " + seconds + " giây";
  if (distance < 0) {
    clearInterval(x);
	document.getElementById("date_time").innerHTML = "Thời gian còn lại: Hết thời gian!";
  }
}, 1000);
</script>
<ul aria-labelledby="languages" class="dropdown-menu">
	<td>- Thời gian bắt đầu:<br> {$hp_time_start}</td><br>
	<td>- Thời gian kết thúc:<br> {$hp_time_finish}</td><br>
	<td>- Tổng thời gian làm bài:<br> {$hp_main_time_hours} giờ {$hp_main_time_mins} phút</td><br>
</ul>
EOF;
} else {
	echo "<script type='text/javascript'>window.onload = date_time('date_time');</script>";
}
?>							
				</li>
                <!-- Dropdown PHP code -->
				<li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle">
<?php if (!isset($_SESSION['user_id']) || !$_SESSION['user_id']){
	echo '<i class="fa fa-user-o" aria-hidden="true"></i><span class="d-none d-sm-inline-block">Đăng nhập</span></a>'; 
	echo '<ul aria-labelledby="languages" class="dropdown-menu">';
print <<<EOF

<form action="./login.php?action=login" method="post" >
	<td>Tên đăng nhập: <input class="form-control" type="text" name="username" value=""></td>
	<td>Mật khẩu: <input class="form-control" type="password" name="password" value=""></td><br>
	<td><p align="center"><input class="btn btn-sm btn-primary" type="submit" name="submit" value="Đăng nhập"></p></td>
</form>

EOF;
} else {
	//Get thong tin user
	$hp_user_id = intval($_SESSION['user_id']);
	$hp_sql_query = "SELECT * FROM {$hp_main_table} WHERE id='{$hp_user_id}'"; 
	$hp_get_member = $db_connect->query($hp_sql_query); 
	$hp_member = $hp_get_member->fetch_assoc();
	echo "<i class='fa fa-user-o' aria-hidden='true'></i><span class='d-none d-sm-inline-block'>Xin chào: {$hp_member['name']} !!</span></a>";
	echo '<ul aria-labelledby="languages" class="dropdown-menu">';
	echo '<li><a rel="nofollow" href="./?NBKJudge=profile" class="dropdown-item"><i class="fa fa-wrench" aria-hidden="true"></i><span>Sửa tài khoản</span></a></li>';
    echo '<li><a rel="nofollow" href="./?NBKJudge=submit" class="dropdown-item"><i class="fa fa-book" aria-hidden="true"></i><span>Nộp bài</span></a></li>';
    echo '<li><a rel="nofollow" href="./?NBKJudge=logout" class="dropdown-item"><i class="fa fa-sign-out" aria-hidden="true"></i><span>Đăng xuất</span></a></li>';		
}
?>				
				   </ul>
				</li>   	
              </ul>	  
            </div>
          </div>
        </nav>
      </header>
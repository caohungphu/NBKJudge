<?php //Code by Hung Phu - Update: 7/10/2019
	include_once("includes/header.php"); 
	include_once("includes/config.php"); 
	if(!isset($_GET["NBKJudge"])){$_GET["NBKJudge"]='';}
	if (!$_SESSION['user_id']){ 
		include_once("includes/header.php");
		print "<script>Swal.fire('Chưa đăng nhập!', 'Hệ thống đang chuyển hướng về trang đăng nhập', 'error' );</script>";
		include_once("includes/footer.php");
		print "<meta http-equiv='refresh' content='0; ./?NBKJudge=login'>";
	} else {
		$hp_sql_query_1 = "SELECT * FROM caidat WHERE id='1'"; 
		$hp_get_setting = $db_connect->query($hp_sql_query_1); 
		$hp_setting = $hp_get_setting->fetch_assoc();
		$hp_allow_history = $hp_setting['document'];
		//Xet xem co phai admin
		if ($_SESSION['user_id'] != 1){
			if ($hp_allow_history == 0){
				print "<script>Swal.fire( 'Admin đã tắt lịch sử!', 'Hệ thống đang chuyển hướng về trang chủ', 'error' );</script>";
				include_once("includes/footer.php");
				print "<meta http-equiv='refresh' content='0; ./'>";
				exit;
			}				
		}
//Main
print <<<EOF

<section class="forms">
    <div class="container-fluid">
        <!-- Page Header-->
        <header> 
            <h1 class="h3 display">TÀI LIỆU</h1>
        </header>
        <div class="row">
				<div class="col-lg-12">
					<div class="card">	
						<div class="card-header">
							<h4><center>Lịch sử chấm bài - NBK Judge</center></h4>
						</div>
						<div class="card-body">
<table class="table table-bordered table-hover table-striped"> 
<thead>
<td align="center"><b>Tên file</b></td>
<td align="center"><b>Thời gian nộp</b></td>
EOF;
//PHP code
	$dir = opendir($hp_dir_logs);
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$hpid = $_SESSION['user_id'];
	$hp_sql_query_1 = "SELECT username FROM members WHERE id='$hpid'";
	$hp_get_member = $db_connect->query($hp_sql_query_1); 
	$hp_member = $hp_get_member->fetch_assoc();
	$hpname = $hp_member['username'];
	if ($hpname == "admin") {
		while ($file = readdir($dir)) { 
			if ($file!="." && $file!=".." && substr($file,0,strlen($file)-4)!="allproblems" )  {
				echo "<tr><td align='center'><a target='_blank' href='./download.php?history=".$file."'>".$file."</a></td>";
				echo "<td align='center'>".date("H:i:s - d/m/Y", filemtime($hp_dir_logs.$file))." </td></tr>";
			}
		}
	closedir($dir);
	} else {
	while ($file = readdir($dir)) { 
		if ($file!="." && $file!=".." && substr($file,0,strlen($file)-4)!="allproblems" && strpos($file, $hpname) > 0 )  {
			$namebai = explode("[", $file);
			$namebai2 = explode("]", $namebai[2]);
			$namebai3 = explode(".", $namebai2[1]);
			$namebaiok = $namebai2[0].".".$namebai3[1];
			echo "<tr><td align='center'><a target='_blank' href='./download.php?history=".$file."'>".strtoupper($namebaiok)."</a></td>";
			echo "<td align='center'>".date("H:i:s - d/m/Y", filemtime($hp_dir_logs.$file))."</td></tr>";
		}
	}
	closedir($dir);
	}
print <<<EOF
</thead>
</table>
						</div>     
					</div>
				</div>	
        </div>
    </div>
</section>
EOF;
}
?>
<?php include_once("includes/footer.php"); ?>	
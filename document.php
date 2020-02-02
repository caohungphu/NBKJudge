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
		$hp_allow_document = $hp_setting['document'];
		//Xet xem co phai admin
		if ($_SESSION['user_id'] != 1){
			if ($hp_allow_document == 0){
				print "<script>Swal.fire( 'Admin đã tắt tài liệu!', 'Hệ thống đang chuyển hướng về trang chủ', 'error' );</script>";
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
							<h4><center>Tài liệu - NBK Judge</center></h4>
						</div>
						<div class="card-body">
<table class="table table-bordered table-hover table-striped"> 
<thead>
<td align="center"><b>Tên file</b></td>
<td align="center"><b>Size</b></td>
<td align="center"><b>Link download</b></td>
EOF;
//PHP code
	$dir = opendir($hp_dir_share_files);
	while ($file = readdir($dir)) { 
		if ($file!="." && $file!=".." && substr($file,0,strlen($file)-4)!="allproblems") {
			echo "<tr><td align='center'><b>".$file."</b></td>";
			echo "<td align='center'>".round(filesize($hp_dir_share_files.$file) * 0.000001)." MB</td>";
			echo "<td align='center'><a target='_blank' href='./download.php?file=".$file."'>Download</a></td></tr>";

	}}
	closedir($dir);
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
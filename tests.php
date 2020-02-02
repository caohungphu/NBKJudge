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
		$hp_allow_tests = $hp_setting['tests'];
		//Xet xem co phai admin
		if ($_SESSION['user_id'] != 1){
			if ($hp_allow_tests == 0){
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
            <h1 class="h3 display">FILES TEST</h1>
        </header>
        <div class="row">
		
EOF;
//PHP code
	$dir = opendir($hp_dir_tests);
	while ($file = readdir($dir)){		
		if ($file!="." && $file!=".." && !is_file($hp_dir_tests."/".$file)){
		echo '<div class="col-lg-12">';
		echo '<div class="card">';	
		echo '<div class="card-header">';
		echo '<h4><center>Bài: '.strtoupper($file).'</center></h4>';
		echo '</div>';
		echo '<div class="card-body">';
		echo '<table class="table table-bordered table-hover table-striped">';
		echo '<thead>';
		echo '<td align="center"><b>TÊN TEST</b></td>';
		echo '<td align="center"><b>INPUT</b></td>';
		echo '<td align="center"><b>OUTPUT</b></td>';
		$subdir = opendir($hp_dir_tests."/".$file);
		while ($subfile = readdir($subdir)){
			echo '<tr>';
			if ($subfile!="." && $subfile!=".." && !is_file($hp_dir_tests."/".$file."/".$subfile)){
				echo "<td align='center'><b>".strtoupper($subfile)."</b></td>";
				$dirnho = $hp_dir_tests . $file . "/" . $subfile;
				$dircon = opendir($dirnho);
				while ($file2 = readdir($dircon)){ 
					if ($file2!="." && $file2!=".." && substr($file,0,strlen($file)-4)!="allproblems"){
						echo "<td align='center'>";
						echo "<a target='_blank' href='./download.php?tests=".$file2."&numtest=".$subfile."&problem=".$file."'>".strtoupper($file2)."</a>";
						echo "</button></td>";
					}
				}	
				closedir($dircon);	
			}
			echo '</tr>';
		}
		closedir($subdir);
		echo '</thead></table>';
		echo '</div></div></div>';
		}
	}
	closedir($dir);	
print <<<EOF
        </div>
    </div>
</section>
<script>
	function ThongBao(arg1, arg2, arg3){
		alert(arg1)
	}
</script>

EOF;
}
?>
<?php include_once("includes/footer.php"); ?>	
<?php //Code by Hung Phu - Update: 03/04/2020
	include_once("includes/header.php"); 
	if(!isset($_GET["NBKJudge"])){$_GET["NBKJudge"]='';}
	if (!$_SESSION['user_id']){ 
		print "<script>Swal.fire('Chưa đăng nhập!', 'Hệ thống đang chuyển hướng về trang đăng nhập', 'error' );</script>";
		include_once("includes/footer.php");
		print "<meta http-equiv='refresh' content='0; ./?NBKJudge=login'>";
	} else {
		//Xet xem co phai admin
		if ($_SESSION['user_id'] != 1){
			if ($hp_main_setting['tests'] == 0){
				print "<script>Swal.fire( 'Admin đã tắt xem tests!', 'Hệ thống đang chuyển hướng về trang chủ', 'error' );</script>";
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
	$dir = opendir($hp_main_contest_dir_tests);
	while ($file = readdir($dir)){		
		if ($file!="." && $file!=".." && !is_file($hp_main_contest_dir_tests.$file)){
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
		$subdir = opendir($hp_main_contest_dir_tests.$file);
		while ($subfile = readdir($subdir)){
			echo '<tr>';
			if ($subfile!="." && $subfile!=".." && !is_file($hp_main_contest_dir_tests.$file."/".$subfile)){
				echo "<td align='center'><b>".strtoupper($subfile)."</b></td>";
				$dirnho = $hp_main_contest_dir_tests . $file . "/" . $subfile;
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
EOF;
}
?>
<?php include_once("includes/footer.php"); ?>	
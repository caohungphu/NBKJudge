<?php //Code by Hung Phu - Update 03/04/2020
	include_once("includes/config.php");
	$hp_tong_thanh_vien = 0; 
	//Get ket qua
	$hp_get_result = $db_connect->query("SELECT username FROM ".$hp_main_table."");
	$db_connect->set_charset("utf8");
	if ($hp_get_result->num_rows > 0){
		while($row = $hp_get_result->fetch_assoc()){
			if ($hp_main_setting['adminsubmit'] == 1) { //Bang diem co admin
				$hp_tong_thanh_vien = $hp_tong_thanh_vien + 1;
				$hp_name_user[$hp_tong_thanh_vien] = $row["username"];
			} else { //Bang diem khong co admin
				if ($row["username"] != "admin"){ 
					$hp_tong_thanh_vien=$hp_tong_thanh_vien+1;
					$hp_name_user[$hp_tong_thanh_vien]=$row["username"];
				}
			}
		}
	}
?>
<!-- HTML code -->
<table class="table table-bordered table-hover table-striped"> 
<thead>
<td align="center"><b>Rank</b></td>
<td align="center"><b>Username</b></td>
<td align="center"><b>Tên thành viên</b></td>
<?php
	//So luong bai tap
	$hp_so_luong_bai_tap = 0;
	$hp_total_sum = 0;
	$hp_dir_it = new DirectoryIterator($hp_main_contest_dir_tests);
	//Get problem
	while($hp_dir_it->valid()) {
		if (!$hp_dir_it->isDot()){	
			$hp_problem = strtoupper($hp_dir_it->getFilename());
			$hp_main_contest_dir_tests_2 = $hp_main_contest_dir_tests.$hp_problem."/";
			$hp_so_luong_bai_tap = $hp_so_luong_bai_tap+1;
			$hp_name_problem[$hp_so_luong_bai_tap] = $hp_problem;
			//Get tests
			$slt = 0;
			$hp_dir_tmp = opendir($hp_main_contest_dir_tests_2);
			while (($file = readdir($hp_dir_tmp)) !== false) {
				if ($file != "." && $file != ".." && is_dir($hp_main_contest_dir_tests_2 . DIRECTORY_SEPARATOR . $file)) {
					$slt++;
				}
			}
			closedir($hp_dir_tmp);
			$hp_total_sum = $hp_total_sum + $slt;
			echo "<td align='center'><b><i>".$hp_problem."<br>(".$slt." tests)</i></b></td>";		
		}
		$hp_dir_it->next();
	}
	//Chua submit
	$hp_not_submit = "∄ Chưa nộp";
	for ($i = 1; $i <= $hp_tong_thanh_vien; $i++){
		for ($j = 1; $j <= $hp_so_luong_bai_tap; $j++){
			$hp_point[$hp_name_user[$i]][$hp_name_problem[$j]] = $hp_not_submit;
		}
	}		
	$hp_dir_it_2 = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($hp_main_contest_dir_logs));
	while($hp_dir_it_2->valid()){
		if (!$hp_dir_it_2->isDot()){	
			$hp_data_info= $hp_dir_it_2->getSubPathName();		
			$r = explode(']', $hp_data_info);
			$user = trim($r[0], '[');
			$bai = strtoupper(trim($r[1], '['));
			$link = $hp_main_contest_dir_logs.$hp_dir_it_2->getSubPathName();
			$fi = fopen($link, "r");
			$data = fgets($fi);
			fclose($fi);
			preg_match ('#: (.+?)\n#s',$data,$res);
			//Get info user
			$hp_sql_query = "SELECT id, username FROM ".$hp_main_table." WHERE username='{$user}'";
			$hp_get_member = $db_connect->query($hp_sql_query); 
			$hp_member = $hp_get_member->fetch_assoc();
			$hp_point[$user][$bai]=$res[1];						
		}	
		$hp_dir_it_2->next();
	}
?>
<!-- HTML code -->
<td align="center"><b>Tổng điểm <br>(<?php echo $hp_total_sum; ?> điểm)</b></td>
</thead>
<?php //Code by Hung Phu - Update: 6/10/2019
	$sumpoint[0]=0;
	for ($i = 1; $i <= $hp_tong_thanh_vien; $i++){
		$hp_sql_query_1 = "SELECT name, color FROM ".$hp_main_table." WHERE username='{$hp_name_user[$i]}'";
		$hp_get_member_2 = $db_connect->query($hp_sql_query_1); 
		$hp_member_2 = $hp_get_member_2->fetch_assoc(); 
		$s=0;
		for ($j = 1; $j <= $hp_so_luong_bai_tap; $j++){	
			$hp_point[$hp_name_user[$i]][$hp_name_problem[$j]]=str_replace(",",".",$hp_point[$hp_name_user[$i]][$hp_name_problem[$j]]);
			$s=$s+$hp_point[$hp_name_user[$i]][$hp_name_problem[$j]];
		}
		$arr_name[$i] = $hp_member_2['name'];
		$hp_color_user[$i] = $hp_member_2['color'];
		$sumpoint[$i]=$s;
	}
	//Sort point
	for ($i = 1; $i <= $hp_tong_thanh_vien; $i++) $pos[$i]=$i;
	for ($i = 1; $i < $hp_tong_thanh_vien; $i++){
        $max = $i;
        for ($j = $i + 1; $j <= $hp_tong_thanh_vien; $j++){
            if (($sumpoint[$pos[$j]] > $sumpoint[$pos[$max]]) || 
				(($sumpoint[$pos[$j]] == $sumpoint[$pos[$max]]) && 
				($hp_name_user[$pos[$j]] < $hp_name_user[$pos[$max]]))){
					$max = $j;
            }
        }
		$z=$pos[$i];
		$pos[$i]=$pos[$max];
		$pos[$max]=$z;	
	}

	for ($i = 1; $i <= $hp_tong_thanh_vien; $i++){
		echo "<tr><td><center><b>".$i."</b></td></center>";
		echo "<td>".$hp_name_user[$pos[$i]]."</td><td align='left'><b><font color='".$hp_color_user[$pos[$i]]."'>".$arr_name[$pos[$i]]."</font></b></td>";
		for ($j = 1; $j <= $hp_so_luong_bai_tap; $j++){	
			echo "<td align='right'>".$hp_point[$hp_name_user[$pos[$i]]][$hp_name_problem[$j]]."&nbsp&nbsp</td>";
		}
		echo "<td align='right'>".$sumpoint[$pos[$i]]."&nbsp&nbsp</td></tr>";
	}
?>
<!-- HTML code -->
</table>
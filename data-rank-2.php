<?php //Code by Hung Phu - Update: 7/10/2019
	include_once("includes/config.php"); 
	//Function
	function getFileName($s) {
		if (is_file($s.'.zip')) return($s.'.zip');
		if (is_file($s.'.pdf')) return($s.'.pdf');
		if (is_file($s.'.jpg')) return($s.'.jpg');
	}
	function getdata($str, &$who, &$problem, &$score) {
		$s = 0;
		while ($s < 100 && !ctype_alpha($str[$s]) && !ctype_digit($str[$s])) ++$s; $e = $s;
		while ($e < 100 && (ctype_alpha($str[$e]) || ctype_digit($str[$e]) || $str[$e] == ' ')) ++$e;
		$who = substr($str, $s, $e - $s); $s = $e;
		while ($s < 100 && !ctype_alpha($str[$s]) && !ctype_digit($str[$s])) ++$s; $e = $s;
		while ($e < 100 && (ctype_alpha($str[$e]) || ctype_digit($str[$e]))) ++$e;
		$problem = substr($str, $s, $e - $s); $s = $e;
		$problem = strtoupper($problem); $s = $e;
		while ($s < 100 && !ctype_digit($str[$s])) ++$s; $e = $s;
		while ($e < 100 && (ctype_digit($str[$e]) || $str[$e] == '.' || $str[$e] == ',')) ++$e;
		$score = substr($str, $s, $e - $s);
	}
	function updatectts(&$name, &$pos, &$exist){ if ($exist) return 0; $pos = $name; $exist = 1; return 1; }
	function updateprbs(&$name, &$pos, &$exist){ if ($exist) return 0; $pos = $name; $exist = 1; return 1; }
	$hp_dir = $hp_dir_logs;
	$cntc = $cntp = 0;
	$reg_cttants = $reg_problems = $sum = $last = $hp_name_user = $hp_problems = array();
	$data = $log = $ac = array(array());
	$color = array("user-grandmaster", "user-hacker", "user-master", "user-expert", "user-coder", "user-novice");
	if (is_dir($hp_dir)) 
		if ($dh = opendir($hp_dir)) {
			while ($file = readdir($dh)) 
				if ($file!="." && $file!=".." && $file != "<") { 
					$handle = @fopen($hp_dir.$file, "r");
					if ($handle && !feof($handle)) { 
						$content = fgets($handle, 100); fclose($handle); 
					}
					getdata($content, $w, $p, $scr);
					if (updatectts($w, $hp_name_user[$cntc], $reg_cttants[$w])) ++$cntc;
					if (updateprbs($p, $hp_problems[$cntp], $reg_problems[$p])) ++$cntp;
					if ($scr == "") continue;
					if ($data[$w][$p] == 0 || filemtime($hp_dir.$file) > filemtime($hp_dir.$log[$w][$p])){
						$data[$w][$p] = $scr;
						$log[$w][$p] = $file;
						$last[$w] = max($last[$w], filemtime($hp_dir.$file));
						$flog = fopen($hp_dir.$file, 'r');
						$numname = 0;
						$numscore = 0;
						while (!feof($flog)) {
							$line_of_text = fgets($flog);
							$numname += substr_count($line_of_text, $w);
							$numscore += substr_count($line_of_text, ': 0.00');
						}
						$numname--;
						if($scr == '0.00') $numscore--;
						if($numscore == 0) 
							$ac[$w][$p] = '#4E9A05';
						else 
							if($numscore == $numname || $scr == '0.00') 
								$ac[$w][$p] = '#F40000';
							else 
								$ac[$w][$p] = '#B99F00';
					} 
				}
			closedir($dh);
		}
	// Get Max Point 
	if($penalty){
		$maxscore = array();
		for ($i = 0; $i < $cntc; ++$i)
			for ($j = 0; $j < $cntp; ++$j){
				$maxscore[$hp_problems[$j]] = max($maxscore[$hp_problems[$j]], $data[$hp_name_user[$i]][$hp_problems[$j]]);
			}
	}
	function getpen($username, $problem){
		if($GLOBALS['penalty']){
			$hp_dir = './'.$GLOBALS['penDir'];
			$files1 = scandir($hp_dir);
			$num = 0;
			$filename = '[' . $username. '][' . $problem . ']';
			for($i = 2; $i < sizeof($files1); $i++) {
				if(!stripos($files1[$i], $filename)) continue;
				$num++;
			}
			$num--;
			if($num > 0) return ' <small><u><font color = "#000000" size = "2px">'.$num.'</font></u></small>';
		}
	}
	function get_score_pen($username, $problem, $score, $max_score)
	{
	  if($GLOBALS['penalty']){
		$hp_dir = './'.$GLOBALS['penDir'];
		$files1 = scandir($hp_dir);
		$num = 0;
		$filename = '[' . $username. '][' . $problem . ']';
		for($i = 2; $i < sizeof($files1); $i++) {
			if(!stripos($files1[$i], $filename)) continue;
			$num++;
		}
		if($score) return number_format($score - $GLOBALS['score_pen'] * max(0, number_format($num - 1, 2)) * number_format($max_score/100,2) , 2);
	  }
	}
?>
<link rel="stylesheet" href="css/rankingv2/datatable.css" type="text/css" charset="utf-8" />
<link rel="stylesheet" href="css/rankingv2/user.css" type="text/css" charset="utf-8"/>
<div class='datatable' style='background-color:#e1e1e1;padding-bottom:6px;position:absolute'>

<div style="background-color:white;margin:.3em 3px 0 3px;position:relative">
	<table class="standings">
<?php 
	function swap(&$xm,&$ym){ 
		$tmp = $xm; 
		$xm = $ym; 
		$ym = $tmp; 
	}
    for ($i = 0; $i < $cntc; ++$i)
        for ($j = 0; $j < $cntp; ++$j)
			if ($data[$hp_name_user[$i]][$hp_problems[$j]] != "..."){
				if ($penalty) $data[$hp_name_user[$i]][$hp_problems[$j]] = get_score_pen($hp_name_user[$i], $hp_problems[$j], $data[$hp_name_user[$i]][$hp_problems[$j]], $maxscore[$hp_problems[$j]] );
				$sum[$hp_name_user[$i]] += $data[$hp_name_user[$i]][$hp_problems[$j]];
            }
		// SORT CONTESTANTS
        for ($i = 0; $i < $cntc; ++$i) 
			for ($j = $i + 1; $j < $cntc; ++$j)
				if ($sum[$hp_name_user[$i]] < $sum[$hp_name_user[$j]] || ($sum[$hp_name_user[$i]] == $sum[$hp_name_user[$j]] && $last[$hp_name_user[$i]] > $last[$hp_name_user[$j]]))
					swap($hp_name_user[$i], $hp_name_user[$j]);
		// SORT PROBLEMS
		for ($i = 0; $i < $cntp; ++$i) 
			for ($j = $i + 1; $j < $cntp; ++$j)
				if ($hp_problems[$i] > $hp_problems[$j])
					swap($hp_problems[$i], $hp_problems[$j]); ?>
<tr>
<th style='color:#445f9d;min-width:80px'><h4>Rank</h4></th>
<th style='text-align:left;min-width:80px;color:#445f9d'><h4>Thí Sinh</h4></th>
<th style='color:#445f9d;min-width:80px'><h4>Tổng</h4></th>
<?php 
	for ($i = 0; $i < $cntp; ++$i) 
		echo "<th style='min-width:95px;'>".$hp_problems[$i]."</th>"; 
?>
</tr>
<?php 
	for ($i = 0; $i < $cntc; ++$i) {
        $hp_level_user = "user-newbie";
        if ($i < 12) $hp_level_user = "user-beginner";
        if ($i < 6) $hp_level_user = $color[min($i, 7)];
        echo "<tr>";
        if ($i % 2) {
			echo "<td>".($i + 1)."</td>";
            echo "<td style='text-align:left;'><b><span class = 'username ".$hp_level_user."'>".$hp_name_user[$i]."</span></b></td>";
            echo "<td style='color:black'><b>".sprintf("%0.2f", $sum[$hp_name_user[$i]])."</b></td>";
            for ($j = 0; $j < $cntp; ++$j){
				echo "<td class = 'score' style='color:#fff;background-color:".$ac[$hp_name_user[$i]][$hp_problems[$j]].";-moz-border-radius: 10px;-webkit-border-radius: 10px;-ms-border-radius: 10px;-o-border-radius: 10px;border-radius: 10px;'>";
				if($data[$hp_name_user[$i]][$hp_problems[$j]]) 
					echo "<a onclick=wload('".$logssubDir.rawurlencode($log[$hp_name_user[$i]][$hp_problems[$j]])."')> <b>".$data[$hp_name_user[$i]][$hp_problems[$j]].getpen($hp_name_user[$i], $hp_problems[$j])."</b> </a>";
				echo " </td>";
            }
		} else {
			echo "<td class='contestant-cell dark'>".($i + 1)."</td>";
            echo "<td style='text-align:left;' class='contestant-cell dark'><b><span class = 'username ".$hp_level_user."'>".$hp_name_user[$i]."</span></b></td>";
            echo "<td style='color:black' class='contestant-cell dark'><b>".sprintf("%0.2f", $sum[$hp_name_user[$i]])."</b></td>";
            for ($j = 0; $j < $cntp; ++$j){
				echo "<td class='score contestant-cell dark' style='color:#fff;background-color:".$ac[$hp_name_user[$i]][$hp_problems[$j]].";-moz-border-radius: 10px;-webkit-border-radius: 10px;-ms-border-radius: 10px;-o-border-radius: 10px;border-radius: 10px;'>";
				if($data[$hp_name_user[$i]][$hp_problems[$j]]) echo "<a onclick=wload('".$logssubDir.rawurlencode($log[$hp_name_user[$i]][$hp_problems[$j]])."')> <b>".$data[$hp_name_user[$i]][$hp_problems[$j]].getpen($hp_name_user[$i], $hp_problems[$j])."</b> </a> ";
				echo "</td>";
            }
        }
        echo "</tr>"; 
    } 
?>
</table>
</div>
</div>
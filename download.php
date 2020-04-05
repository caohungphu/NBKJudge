<?php //Code by Hung Phu - Update 03/04/2020
include_once("includes/config.php");
include_once("functions.php");
header('Content-Type: text/html; charset=UTF-8');

if(isset($_REQUEST["file"])){
	$file = urldecode($_REQUEST["file"]);
	$filepath = $hp_main_contest_dir_files.$file;
	if(file_exists($filepath)){
		if (strpos($file, "doc") > 0)
			zip_and_download_doc_file($hp_main_contest_dir_tmp_files, $hp_main_contest_dir_files.$file);
		else 
			download_file($filepath);
	}
}

if(isset($_REQUEST["tests"])){
    $file = urldecode($_REQUEST["tests"]);
	$numtest = urldecode($_REQUEST["numtest"]);
	$problem = urldecode($_REQUEST["problem"]);
    $filepath = $hp_main_contest_dir_tests . $problem . "/" . $numtest . "/" . $file;
    // Process download
    if(file_exists($filepath)) {
         download_test_file($filepath);
    }
}

if(isset($_REQUEST["history"])){
    $file = urldecode($_REQUEST["history"]);
    $filepath = $hp_main_contest_dir_logs . $file;
    if(file_exists($filepath)) {
         download_history_file($filepath);
    }
}

print <<<EOF

<!---=====================================================================*\

|| #################################################################### ||

|| # *             			 Code by HP2k1   		                  # ||

|| # ---------------------------------------------------------------- # ||

|| #           Copyright by HP2k1 . All Rights Reserved.              # ||

|| #                        FUCK YOU DECODER                          # ||

|| #                  ==>[    Do not coppy    ]<==                    # ||

|| #################################################################### ||

\*===================================================================--->

<link rel="icon" type="image/png" href="https://i.imgur.com/046megj.jpg" />

      <script language="javascript">

var rev = "fwd";

function titlebar(val)

{

var msg = "::. Sorry !!! Not Found .::";

var res = " ";

var speed = 100;

var pos = val;

msg = "=>[ "+msg+" ]<=";

var le = msg.length;

if(rev == "fwd"){

if(pos < le){

pos = pos+1;

scroll = msg.substr(0,pos);

document.title = scroll;

timer = window.setTimeout("titlebar("+pos+")",speed);

}

else{

rev = "bwd";

timer = window.setTimeout("titlebar("+pos+")",speed);

}

}

else{

if(pos > 0){

pos = pos-1;

var ale = le-pos;

scrol = msg.substr(ale,le);

document.title = scrol;

timer = window.setTimeout("titlebar("+pos+")",speed);

}

else{

rev = "fwd";

timer = window.setTimeout("titlebar("+pos+")",speed);

}

}

}

titlebar(0);

</script>

<center><font size="10" face="Keania One" color="red">Sorry !!! <font color="green">NOT<font color="#38df21"> FOUND</font></font></font></font></font></div></h2></center>

<center><img height="300x" src="https://i.imgur.com/046megj.jpg" width="300px"> </center>

<center><b>Hệ thống sẽ tự trở về trang chủ sau vài giây !!!</b></center>

<meta http-equiv=refresh content="3; URL=./">
EOF;
?>
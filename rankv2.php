<?php //Code by Hung Phu - Update: 7/10/2019
	include_once("includes/header.php");
	if(!isset($_GET["NBKJudge"])){$_GET["NBKJudge"]='';}
	$hp_sql_query = "SELECT * FROM caidat WHERE id='1'";
	$hp_get_setting = $db_connect->query($hp_sql_query); 
	$hp_setting = $hp_get_setting->fetch_assoc();
	$hp_allow_viewrank = "{$hp_setting['viewrank']}";
	if ($hp_allow_viewrank==0){
		if (isset($_SESSION['user_id'] )){
			$user_id = intval($_SESSION['user_id']);
			$hp_sql_query = "SELECT * FROM ".$hp_setting['cosodulieu']." WHERE id='{$user_id}'";
			$hp_get_member = $db_connect->query($hp_sql_query); 
			$hp_member = $hp_get_member->fetch_assoc();
			if ($hp_member['admin'] == "0"){
				if ($hp_allow_viewrank == 0){
					print "<script>Swal.fire( 'Admin đã tắt bảng điểm!', 'Vui lòng liên hệ admin!!', 'error' );</script>";
					include_once("includes/footer.php"); 
					print "<meta http-equiv='refresh' content='0; ./'>";
					exit;
				}
			}
		} else {
			print "<script>Swal.fire( 'Đăng nhập để xem bảng điểm!', 'Vui lòng đăng nhập!!', 'error' );</script>";
			include_once("includes/footer.php"); 
			print "<meta http-equiv='refresh' content='0; ./?NBKJudge=login'>";
			exit;
		}
	}
?>
<section class="forms">
    <div class="container-fluid">
	    <!-- Page Header-->
        <header> 
            <h1 class="h3 display">BẢNG ĐIỂM TỔNG QUÁT VERSION 2</h1>
        </header>
        <div class="row">
			<div class="col-lg-12">
<script type="text/javascript">
function Ajax(){
var xmlHttp;
	try{	
		xmlHttp=new XMLHttpRequest();// Firefox, Opera 8.0+, Safari
	}
	catch (e){
		try{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
		}
		catch (e){
		    try{
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch (e){
				alert("No AJAX!?");
				return false;
			}
		}
	}
xmlHttp.onreadystatechange=function(){
	if(xmlHttp.readyState==4){
		document.getElementById('ReloadThis').innerHTML=xmlHttp.responseText;
		setTimeout('Ajax()',1000);
	}
}
xmlHttp.open("GET","data-rank-2.php",true);
xmlHttp.send(null);
}
window.onload=function(){
	setTimeout('Ajax()',0);
}
</script>
<div id="ReloadThis"><img src="img/load.gif"/> Đang tải bảng xếp hạng... </div>
			</div>	
        </div>
    </div>
</section>
<?php include_once("includes/footer.php"); ?>

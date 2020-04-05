<?php //Code by Hung Phu - Update: 03/04/2020
	include_once("includes/header.php");
	if(!isset($_GET["NBKJudge"])){$_GET["NBKJudge"]='';}
	if ($hp_main_setting['viewrank'] == 0){
		if (isset($_SESSION['user_id'] )){
			$user_id = intval($_SESSION['user_id']);
			$hp_sql_query = "SELECT * FROM ".$hp_main_table." WHERE id='{$user_id}'";
			$hp_get_member = $db_connect->query($hp_sql_query); 
			$hp_member = $hp_get_member->fetch_assoc();
			if ($hp_member['admin'] == "0"){
				if ($hp_main_setting['viewrank'] == 0){
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

<style>
.hp_form_submit{
	float: right;
	margin: 10px;
    overflow: hidden;
}
.hp_form_border{
	text-align: center;
	border: 2px dashed #3CB371; 
	border-radius: 2% 2% 2% 2%;	
}
</style>
<div class="hp_form_submit">
	<form class="hp_form_border" action="submit.php?action=submit" method="post" enctype="multipart/form-data">
	</span><input type="file" name="fileToUpload" id="fileToUpload">	
	<input type="submit" name="submit" value="Nộp bài" class="btn btn-primary">		
	</form>
</div>

<section class="forms">	
	
    <div class="container-fluid">
	    <!-- Page Header-->
        <header> 
            <h1 class="h3 display">BẢNG ĐIỂM TỔNG QUÁT</h1>					
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
xmlHttp.open("GET","data-rank.php",true);
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

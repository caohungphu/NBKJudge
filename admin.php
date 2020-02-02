<?php //Code by Hung Phu - Update: 7/10/2019
	include_once("includes/header.php");
	include_once("includes/connect.php");
	include_once("includes/config.php");
	if(!isset($_GET["NBKJudge"])){$_GET["NBKJudge"]='';}
	if (!$_SESSION['user_id']){ 
		include_once("includes/header.php");
		print "<script>Swal.fire('Chưa đăng nhập!', 'Hệ thống đang chuyển hướng về trang đăng nhập', 'error' );</script>";
		include_once("includes/footer.php");
		print "<meta http-equiv='refresh' content='0; ./?NBKJudge=login'>";
		exit;
	} else {
		//Check admin
		$user_id = intval($_SESSION['user_id']);
		$hp_sql_query = "SELECT * FROM ".$hp_setting['cosodulieu']." WHERE id='{$user_id}'";
		$hp_get_member = $db_connect->query($hp_sql_query); 
		$hp_member = $hp_get_member->fetch_assoc();
		if ($hp_member['admin']!="1"){
			include_once("includes/header.php");
			print "<script>Swal.fire('Bạn không có quyền ADMIN!', 'Hệ thống đang chuyển hướng về trang chủ', 'error' );</script>";
			include_once("includes/footer.php");
			print "<meta http-equiv='refresh' content='0; ./'>";
			exit;
		}
		else {
			$hp_sql_query = "SELECT * FROM caidat WHERE id='1'";
			$hp_setting1 = $db_connect->query($hp_sql_query); 
			$hp_setting = $hp_setting1->fetch_assoc();
			$coso = $hp_setting['cosodulieu'];
			//SELECT FORMAT(myDate, 'yyyy-MM-ddTHH:mm:ss') AS myDate
			$hp_sql_query2 = "SELECT * FROM data WHERE tentable='$coso'";
			$data1 = $db_connect->query($hp_sql_query2); 
			$data = $data1->fetch_assoc();
	//Main
	if (isset($_GET['action'])) {
		if ($_GET['action']=="edit") {	
			//Hien admin
			if (isset($_POST['adminsubmit'])) $adminsubmit = 1; else $adminsubmit = 0;
			//$adminsubmit = addslashes( $_POST['adminsubmit'] );
			//Cho phep nop bai
			if (isset($_POST['submission'])) $submit = 1; else $submit = 0;
			//$submit = addslashes( $_POST['submission'] );
			//Cho phep dang ki
			if (isset($_POST['registration'])) $register = 1; else $register = 0;
			//$register = addslashes( $_POST['registration'] );
			//Cho phep xem bang xep hang
			if (isset($_POST['viewrank'])) $rank = 1; else $rank = 0;
			//$rank = addslashes( $_POST['viewrank'] );
			//Cho phep sua profile
			if (isset($_POST['editprofile'])) $profile = 1; else $profile = 0;
			//$profile = addslashes( $_POST['editprofile'] );
			//Cho phep xem tai lieu
			if (isset($_POST['document'])) $document = 1; else $document = 0;
			//$document = addslashes( $_POST['document'] );
			//Cho phep xem tests
			if (isset($_POST['tests'])) $tests = 1; else $tests = 0;
			//$tests = addslashes( $_POST['tests'] );
			//Cho phep xem lich su
			if (isset($_POST['history'])) $history = 1; else $history = 0;
			//$history = addslashes( $_POST['history'] );
			//Thong bao
			$adminarlert = addslashes( $_POST['adminarlert'] );
			$adminarlert2 = addslashes( $_POST['adminarlert2'] );
			$adminarlert3 = addslashes( $_POST['adminarlert3'] );
			//Chon database
			$cosodulieu = addslashes( $_POST['cosodulieu'] );
			$sql="
			UPDATE `caidat` SET
			`adminsubmit` = '".$adminsubmit."',
			`submission` = '".$submit."',
			`registration` = '".$register."',
			`viewrank` = '".$rank."',
			`editprofile` = '".$profile."',
			`document` = '".$document."',
			`tests` = '".$tests."',
			`history` = '".$history."',
			`adminarlert` = '".$adminarlert."',
			`adminarlert2` = '".$adminarlert2."',
			`adminarlert3` = '".$adminarlert3."',
			`cosodulieu` = '".$cosodulieu."' WHERE `id` = 1 ;";
			if ($sua=$db_connect->query($sql)){
				include_once("includes/header.php");
				print "<script>Swal.fire( 'Chỉnh sửa thành công!', 'Hệ thống đang chuyển hướng về trang admin', 'success' );</script>";
				include_once("includes/footer.php");
				print "<meta http-equiv='refresh' content='0; ./?NBKJudge=admin'>";
				exit;
			} else {
				include_once("includes/header.php");
				print "<script>Swal.fire( 'Chỉnh sửa thất bại!', 'Hệ thống đang chuyển hướng về trang admin', 'error' );</script>";
				include_once("includes/footer.php");
				print "<meta http-equiv='refresh' content='0; ./?NBKJudge=admin'>";
				exit;
			}
		}
		if ($_GET['action']=="delete") {	
			//Hàm xóa
			function HP_delete($dir = null) {
				if (is_dir($dir)) {
					$objects = scandir($dir);
					foreach ($objects as $object) {
						if ($object != "." && $object != "..") {
							if (filetype($dir."/".$object) == "dir") HP_delete($dir."/".$object);
							else unlink($dir."/".$object);
						}
					}
					reset($objects);
				}
			}			
			HP_delete($hp_dir_logs);
			include_once("includes/header.php");
			print "<script>Swal.fire( 'Xóa thành công!', 'Hệ thống đang chuyển hướng về trang admin', 'success' );</script>";
			include_once("includes/footer.php");
			print "<meta http-equiv='refresh' content='0; ./?NBKJudge=admin'>";
			exit;
		}
		if ($_GET['action']=="editconfig") {
			$title = addslashes( $_POST['title']);
			$description = addslashes( $_POST['description'] );
			if (isset($_POST['timecount'])) $timecount = 1; else $timecount = 0;
			$timestart = addslashes( $_POST['timestart'] );
			$timefinish = addslashes( $_POST['timefinish'] );
			$sql="
			UPDATE `data` SET
			`title` = '".$title."',
			`description` = '".$description."',
			`timecount` = '".$timecount."',
			`timestart` = '".$timestart."',
			`timefinish` = '".$timefinish."' WHERE `tentable` = '$coso' ;";
			if ($editconfig=$db_connect->query($sql)){ 
				include_once("includes/header.php");
				print "<script>Swal.fire( 'Chỉnh sửa thành công!', 'Hệ thống đang chuyển hướng về trang admin', 'success' );</script>";
				include_once("includes/footer.php");
				print "<meta http-equiv='refresh' content='0; ./?NBKJudge=admin'>";
				exit;
			} else {
				include_once("includes/header.php");
				print "<script>Swal.fire( 'Chỉnh sửa thất bại!', 'Hệ thống đang chuyển hướng về trang admin', 'error' );</script>";
				include_once("includes/footer.php");
				print "<meta http-equiv='refresh' content='0; ./?NBKJudge=admin'>";
				exit;
			}
		}
	} else {
//Main
print <<<EOF
<section class="forms">
    <div class="container-fluid">
        <!-- Page Header-->
        <header> 
            <h1 class="h3 display">BẢNG ĐIỀU KHIỂN</h1>
        </header>
        <div class="row">
				<div class="col-lg-12">
					<div class="card">	
						<div class="card-header">
							<h4><center>CHỈNH SỬA THÔNG TIN KÌ THI (TIÊU ĐỀ, THÔNG TIN THÊM, THỜI GIAN KÌ THI)</center></h4>
						</div>
						<div class="card-body">
							<form action="./admin.php?action=editconfig" method="post">
								<div class="form-group">       
									<label>Tiêu đề:</label>
									<input type="text" placeholder="Tiêu đề" value="{$data['title']}" name="title" class="form-control">
								</div>
								<div class="form-group">       
									<label>Thông tin thêm:</label>
									<input type="text" placeholder="Thông tin thêm" value="{$data['description']}" name="description" class="form-control">
								</div>
								<br>
EOF;
							echo '<input id="checkboxCustom_time" type="checkbox" name="timecount" ';
							if ($data['timecount'] == 1) echo 'checked=""';
							echo ' class="form-control-custom" >';
							echo '<label for="checkboxCustom_time"><font color="red">THỜI GIAN KÌ THI</font></label><br><br>';

print <<<EOF
								<div class="form-group">       
									<label>- Thời gian bắt đầu kì thi (<font color="red">Định dạng: Năm-Tháng-Ngày Giờ-Phút-Giây</font>) :</label>
									<input type="datetime" value="{$data['timestart']}" name="timestart" class="form-control">
								</div>
								<div class="form-group">       
									<label>- Thời gian kết thúc kì thi (<font color="red">Định dạng: Năm-Tháng-Ngày Giờ-Phút-Giây</font>) :</label>
									<input type="datetime" value="{$data['timefinish']}" name="timefinish" class="form-control">
								</div>
								<br>
								<div class="form-group">       
									<center><input type="submit" name="submit" value="Chỉnh sửa!" class="btn btn-primary"></center>
								</div>
							</form>
						</div>     
					</div>
				</div>
				<div class="col-lg-12">
					<div class="card">	
						<div class="card-header">
							<h4><center>CHỈNH SỬA CƠ BẢN (DATABASE, THÔNG BÁO, QUYỀN TRUY CẬP)</center></h4>
						</div>
						<div class="card-body">
							<form action="./admin.php?action=edit" method="post">
								<div class="form-group">
									<label>Cơ sở dữ liệu: | Hiện tại: <b>{$hp_setting['cosodulieu']}</b></label>
									<select name="cosodulieu" class="form-control">
										<option value="{$hp_setting['cosodulieu']}">Không chỉnh sửa</option>
										<option value="members">Members</option>
										<option value="members1">Members 2</option>
										<option value="members2">Members 3</option>
										<option value="members3">Members 4</option>
										<option value="members4">Members 5</option>
										<option value="members5">Members 6</option>
										<option value="members6">Members 7</option>
										<option value="members7">Members 8</option>
										<option value="members8">Members 9</option>
										<option value="members9">Members 10</option>
										<option value="members10">Members 11</option>
									</select>
								</div>
								<div class="form-group">       
									<label>Thông báo (Mức độ 1):</label>
									<input type="text" placeholder="Thông báo mức độ 1" value="{$hp_setting['adminarlert']}" name="adminarlert" class="form-control">
								</div>
								<div class="form-group">       
									<label>Thông báo (Mức độ 2):</label>
									<input type="text" placeholder="Thông báo mức độ 2" value="{$hp_setting['adminarlert2']}" name="adminarlert2" class="form-control">
								</div>
								<div class="form-group">       
									<label>Thông báo (Mức độ 3):</label>
									<input type="text" placeholder="Thông báo mức độ 3" value="{$hp_setting['adminarlert3']}" name="adminarlert3" class="form-control">
								</div>
EOF;
							echo '<div class="form-group">';
							echo '<label>Quyền truy cập:</label>';
							echo '<div class="i-checks">';
							//Adminsubmit
							echo '<input id="checkboxCustom1" type="checkbox" name="adminsubmit" ';
							if ($hp_setting['adminsubmit'] == 1) echo 'checked=""';
							echo ' class="form-control-custom" >';
							echo '<label for="checkboxCustom1"><font color="black">Hiện tên admin trên bảng xếp hạng V1</font></label><br><br>';
							//Allowsubmit
							echo '<input id="checkboxCustom2" type="checkbox" name="submission" ';
							if ($hp_setting['submission'] == 1) echo 'checked=""';
							echo ' class="form-control-custom" >';
							echo '<label for="checkboxCustom2"><font color="black">Cho phép nộp bài</font></label><br><br>';
							//Allowregister
							echo '<input id="checkboxCustom3" type="checkbox" name="registration" ';
							if ($hp_setting['registration'] == 1) echo 'checked=""';
							echo ' class="form-control-custom" >';
							echo '<label for="checkboxCustom3"><font color="black">Cho phép đăng kí</font></label><br><br>';
							//AllowRank
							echo '<input id="checkboxCustom4" type="checkbox" name="viewrank" ';
							if ($hp_setting['viewrank'] == 1) echo 'checked=""';
							echo ' class="form-control-custom" >';
							echo '<label for="checkboxCustom4"><font color="black">Cho phép xem bảng xếp hạng</font></label><br><br>';
							//AllowEdit
							echo '<input id="checkboxCustom5" type="checkbox" name="editprofile" ';
							if ($hp_setting['editprofile'] == 1) echo 'checked=""';
							echo ' class="form-control-custom" >';
							echo '<label for="checkboxCustom5"><font color="black">Cho phép chỉnh sửa thông tin</font></label><br><br>';
							//AllowDocument
							echo '<input id="checkboxCustom6" type="checkbox" name="document" ';
							if ($hp_setting['document'] == 1) echo 'checked=""';
							echo ' class="form-control-custom" >';
							echo '<label for="checkboxCustom6"><font color="black">Cho phép xem thư mục tài liệu</font></label><br><br>';
							//AllowTests
							echo '<input id="checkboxCustom7" type="checkbox" name="tests" ';
							if ($hp_setting['tests'] == 1) echo 'checked=""';
							echo ' class="form-control-custom" >';
							echo '<label for="checkboxCustom7"><font color="black">Cho phép xem files test</font></label><br><br>';
							//AllowHistory
							echo '<input id="checkboxCustom8" type="checkbox" name="history" ';
							if ($hp_setting['history'] == 1) echo 'checked=""';
							echo ' class="form-control-custom" >';
							echo '<label for="checkboxCustom8"><font color="black">Cho phép xem lịch sử chấm</font></label><br><br>';
							echo '</div>';
							echo '</div>';
print <<<EOF
								<br>
								<div class="form-group">       
									<center><input type="submit" name="submit" value="Chỉnh sửa!" class="btn btn-primary"></center>
								</div>
							</form>
						</div>     
					</div>
				</div>
				<div class="col-lg-12">
					<div class="card">	
						<div class="card-header">
							<h4><center>CHỨC NĂNG KHÁC</center></h4>
						</div>
						<div class="card-body">
							<form action="./admin.php?action=delete" method="post">
								<label>Xóa dữ liệu chấm cũ: <input type="submit" name="submit" value="Thực hiện" class="btn btn-primary"></label>
							</form>
						</div>     
					</div>
				</div>	
        </div>
    </div>
</section>	
EOF;
		
		}
	}
} 
?>
<?php include_once("includes/footer.php"); ?>
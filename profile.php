<?php //Code by Hung Phu - Update: 7/10/2019
	include_once("includes/header.php");
	include_once("includes/connect.php");
	if(!isset($_GET["NBKJudge"])){$_GET["NBKJudge"]='';}
	if (!$_SESSION['user_id']){ 
		include_once("includes/header.php");
		print "<script>Swal.fire('Chưa đăng nhập!', 'Hệ thống đang chuyển hướng về trang đăng nhập', 'error' );</script>";
		include_once("includes/footer.php");
		print "<meta http-equiv='refresh' content='0; ./?NBKJudge=login'>";
		exit;
	} else { 
	//Check edit
		session_start();
		$hp_sql_query_1 = "SELECT * FROM caidat WHERE id='1'"; 
		$hp_get_setting = $db_connect->query($hp_sql_query_1); 
		$hp_setting = $hp_get_setting->fetch_assoc();
		$hp_allow_edit = "{$hp_setting['editprofile']}";
		$user_id = intval($_SESSION['user_id']);
		$hp_sql_query_1 = "SELECT * FROM ".$hp_setting['cosodulieu']." WHERE id='{$user_id}'"; 
		$hp_get_member = $db_connect->query($hp_sql_query_1); 
		$hp_member = $hp_get_member->fetch_assoc();
		if ($hp_member['admin'] == "0"){
			if ($hp_allow_edit == 0) {
				print "<script>Swal.fire( 'Admin đã tắt tài liệu!', 'Hệ thống đang chuyển hướng về trang chủ', 'error' );</script>";
				include_once("includes/footer.php");
				print "<meta http-equiv='refresh' content='0; ./'>";
				exit;
			}
		}
	if (isset($_GET['action']) && $_GET['action']=="edit") {
		$ten = addslashes( $_POST['name'] );
		$pass = md5( addslashes( $_POST['pass'] ) );
		$birthday = addslashes( $_POST['$birthday'] );
		$phone = addslashes( $_POST['phone'] );
		$email = addslashes( $_POST['email'] );
		$color = addslashes( $_POST['color'] );
		$sql="
		UPDATE `".$hp_setting['cosodulieu']."` SET
		`email` = '".$email."',
		`phone` = '".$phone."',
		`name` = '".$ten."',
		`color` = '".$color."',
		`birthday` = '".$birthday."' WHERE `id` =$user_id LIMIT 1 ;";
	
		if ($sua=$db_connect->query($sql)){
			if (isset($_POST['pass'])&&$_POST['pass']!="") {
				$sql_pass = "UPDATE `".$hp_setting['cosodulieu']."` SET `password` = '".$pass."' WHERE `id` = '$user_id' LIMIT 1 ;";
				$suapass = $db_connect->query($sql_pass);
			}
			include_once("includes/header.php");
			print "<script>Swal.fire( 'Chỉnh sửa thành công!', 'Hệ thống đang chuyển hướng về trang chủ', 'success' );</script>";
			include_once("includes/footer.php");
			print "<meta http-equiv='refresh' content='0; ./'>";
			exit;
		} else {
			include_once("includes/header.php");
			print "<script>Swal.fire( 'Chỉnh sửa thất bại!', 'Hệ thống đang chuyển hướng về trang chỉnh sửa', 'error' );</script>";
			include_once("includes/footer.php");
			print "<meta http-equiv='refresh' content='0; ./?NBKJudge=profile'>";
			exit;
		}
	}
	else {
print <<<EOF
<section class="forms">
    <div class="container-fluid">
        <!-- Page Header-->
        <header> 
            <h1 class="h3 display">CHỈNH SỬA THÔNG TIN</h1>
        </header>
        <div class="row">
				<div class="col-lg-6">
					<div class="card">	
						<div class="card-body">
							<form action="./profile.php?action=edit" method="post">
								<div class="form-group">
									<label>Họ và tên:</label>
									<input type="text" placeholder="Họ và tên" value="{$hp_member['name']}" name="name" class="form-control">
								</div>
								<div class="form-group">
									<label>Email:</label>
									<input type="email" placeholder="Email" value="{$hp_member['email']}" name="email" class="form-control">
								</div>
								<div class="form-group">       
									<label>Số điện thoại:</label>
									<input type="tel" placeholder="Số điện thoại" value="{$hp_member['phone']}" name="phone" class="form-control">
								</div>
								<div class="form-group">       
									<label>Sinh nhật:</label>
									<input type="date" placeholder="Sinh nhật" value="{$hp_member['birthday']}" name="birthday" class="form-control">
								</div>		
						</div>     
					</div>
				</div>
				<div class="col-lg-6">
					<div class="card">	
						<div class="card-body">
								<div class="form-group">
									<label>Màu bảng tên:</label>
									<select name="color" class="form-control">
										<option value="{$hp_member['color']}">Mặc định như cũ</option>
										<option value="red">Đỏ</option>
										<option value="orange">Cam</option>
										<option value="yellow">Vàng</option>
										<option value="green">Lục</option>
										<option value="blue">Lam</option>
										<option value="brown">Nâu</option>
										<option value="grey">Xám</option>
										<option value="black">Đen</option>
										<option value="#FF00FF">Hồng</option>
										<option value="purple">Tím</option>
									</select>
								</div>			
								<div class="form-group">
									<label>Mật khẩu mới:</label>
									<input type="password" placeholder="Mật khẩu mới" name="pass" class="form-control">
								</div>		
								<p>- Lưu ý: <font color="red">Muốn đổi password thì nhập password mới vào ô password nếu không thì để trống!!!</font></p>
								<div class="form-group">       
									<center><input type="submit" name="submit" value="Chỉnh sửa!" class="btn btn-primary"></center>
								</div>
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
?>
<?php include_once("includes/footer.php"); ?>
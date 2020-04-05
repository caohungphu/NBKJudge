<?php //Code by Hung Phu - Update 02/04/2020
	include_once("includes/header.php");
	if(!isset($_GET["NBKJudge"])){$_GET["NBKJudge"]='';}
	if ((!isset($_SESSION['user_id'])) or ($_SESSION['user_id']==1)){
		//Tat dang ki
		if (!isset($_SESSION['user_id'])) {
		if ($hp_main_setting['registration'] == 0) 
			{
				print "<script>Swal.fire( 'Admin đã tắt đăng kí!', 'Hệ thống đang chuyển hướng về trang chủ', 'error' );</script>";
				include_once("includes/footer.php");
				print "<meta http-equiv='refresh' content='0; ./'>";
				exit;
			}
		}
	//Mo dang ki
	if (isset($_GET['action']) && $_GET['action'] == "register" ){
		//Get thong tin
		$username = addslashes( $_POST['username'] );
		$ten = addslashes( $_POST['name'] );
		$password = md5( addslashes( $_POST['password'] ) );
		$verify_password = md5( addslashes( $_POST['verify_password'] ) );
		$email = addslashes( $_POST['email'] );
		$phone = addslashes( $_POST['phone'] );
		$sinhnhat = addslashes( $_POST['birthday'] );
		$input_color  = array("red", "orange", "yellow", "green", "blue", "brown", "grey", "black", "#FF00FF", "purple");
		$hp_color = $input_color[rand(0, count($input_color) - 1)];
		//Check info
		if ( ! $username || ! $_POST['password'] || ! $_POST['verify_password'] || ! $ten){
			print "<script>Swal.fire( 'Thiếu thông tin!', 'Vui lòng nhập đầy đủ thông tin', 'error' );</script>";
			include_once("includes/footer.php");
			print "<meta http-equiv='refresh' content='0; ./?NBKJudge=register'>";
			exit;
		}
		//Check user
		if (!preg_match('/^[_a-z-0-9-A-Z]+$/', $username, $matches)){
			print "<script>Swal.fire( 'Username không hợp lệ!', 'Username chỉ cho phép [a->z],[A->Z], [0->9]', 'error' );</script>";
			include_once("includes/footer.php");
			print "<meta http-equiv='refresh' content='0; ./?NBKJudge=register'>";
			exit;
		}
		//Check user co trung hay khong
		if ( $db_connect->query("SELECT username FROM ".$hp_main_table." WHERE username='$username'")->num_rows>0){
			print "<script>Swal.fire( 'Username đã có người dùng!', 'Vui lòng chọn username khác!', 'error' );</script>";
			include_once("includes/footer.php");
			print "<meta http-equiv='refresh' content='0; ./?NBKJudge=register'>";
			exit;
		}
		//Check pass giong nhau
		if ( $password != $verify_password ){
			print "<script>Swal.fire( 'Mật khẩu không khớp!', 'Vui lòng nhập lại mật khẩu!', 'error' );</script>";
			include_once("includes/footer.php");
			print "<meta http-equiv='refresh' content='0; ./?NBKJudge=register'>";
			exit;
		}
		//Dien form
		$hp_set_form=$db_connect->query("INSERT INTO ".$hp_main_table." (username, password, email, phone, name, birthday, color) VALUES ('{$username}', '{$password}', '{$email}', '{$phone}', '{$ten}', '{$sinhnhat}', '{$hp_color}')");
		//Thong bao tao tai khoan
		if ($hp_set_form){
			print "<script>Swal.fire( 'Đăng kí thành công!', 'Hệ thống đang chuyển hướng về trang đăng nhập', 'success' );</script>";
			include_once("includes/footer.php");
			print "<meta http-equiv='refresh' content='0; ./?NBKJudge=login'>";
			exit;
		} else {
			print "<script>Swal.fire( 'Đăng kí thất bại!', 'Vui lòng liên hệ admin để giải quyết!', 'error' );</script>";
			include_once("includes/footer.php");
			print "<meta http-equiv='refresh' content='0; ./'>";
			exit;
		}
	} else {
// Form đăng ký
print <<<EOF
<section class="forms">
    <div class="container-fluid">
        <!-- Page Header-->
        <header> 
            <h1 class="h3 display">ĐĂNG KÍ</h1>
        </header>
        <div class="row">
				<div class="col-lg-6">
					<div class="card">	
						<div class="card-body">
							<form action="register.php?action=register" method="post">
								<div class="form-group">
									<label><font color="red">(*)</font> Tên đăng nhập:</label>
									<input type="text" placeholder="Tên đăng nhập" name="username" class="form-control">
								</div>
								<div class="form-group">
									<label><font color="red">(*)</font> Họ và tên:</label>
									<input type="text" placeholder="Họ và tên" name="name" class="form-control">
								</div>
								<div class="form-group">       
									<label><font color="red">(*)</font> Mật khẩu:</label>
									<input type="password" placeholder="Mật khẩu" name="password" class="form-control">
								</div>
								<div class="form-group">       
									<label><font color="red">(*)</font> Xác nhận mật khẩu:</label>
									<input type="password" placeholder="Xác nhận mật khẩu" name="verify_password" class="form-control">
								</div>
						</div>     
					</div>
				</div>
				<div class="col-lg-6">
					<div class="card">	
						<div class="card-body">
								<div class="form-group">       
									<label><font color="red">(*)</font> Email:</label>
									<input type="email" placeholder="Email" name="email" class="form-control">
								</div>		
								<div class="form-group">
									<label>Số điện thoại:</label>
									<input type="tel" placeholder="Số điện thoại" name="phone" class="form-control">
								</div>			
								<div class="form-group">
									<label>Ngày sinh:</label>
									<input type="date" placeholder="Ngày sinh" name="birthday" class="form-control">
								</div>		
								<p>- Lưu ý: <font color="red">Thông tin (*) là thông tin bắt buộc!!!</font></p>
								<div class="form-group">       
									<center><input type="submit" name="submit" value="Đăng kí" class="btn btn-primary"></center>
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
} else {
	print "<script>Swal.fire('Đã đăng nhập với tên {$hp_member['username']}', 'Hệ thống đang chuyển hướng về trang chủ', 'success' );</script>";
	include_once("includes/footer.php");
	print "<meta http-equiv='refresh' content='0; ./'>";
}
?>
<?php include_once("includes/footer.php"); ?>
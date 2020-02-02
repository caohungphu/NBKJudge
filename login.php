<?php //Code by Hung Phu - Update: 7/10/2019
	include_once("includes/header.php");
	if(!isset($_GET["NBKJudge"])){$_GET["NBKJudge"]='';}
	if (isset($_GET['action']) && $_GET['action'] == "login"){
		//Get username + pass
		$username = addslashes($_POST['username']);
		$password = md5(addslashes( $_POST['password']));
		//Get data table
		$hp_sql_query = "SELECT * FROM caidat WHERE id=1";
		$hp_get_csdl = $db_connect->query($hp_sql_query); 
		$hp_csdl = $hp_get_csdl->fetch_assoc();
		$hp_csdl_main = $hp_csdl['cosodulieu'];
		$hp_sql_query_2 = "SELECT id, username, admin, password FROM ".$hp_csdl_main." WHERE username='{$username}'";
		//Check member
		$hp_get_member = $db_connect->query($hp_sql_query_2); 
		$hp_member = $hp_get_member->fetch_assoc();
		if ($hp_get_member->num_rows <= 0){
			include_once("includes/header.php");
			print "<script>Swal.fire( 'Tên đăng nhập sai!', 'Vui lòng nhập đúng tên đăng nhập!', 'error' );</script>";
			include_once("includes/footer.php");
			print "<meta http-equiv='refresh' content='0; ./?NBKJudge=login'>";
			exit;
		}
		//Check pass
		if ($password != $hp_member['password']){
			include_once("includes/header.php");
			print "<script>Swal.fire( 'Mật khẩu sai!', 'Vui lòng nhập đúng mật khẩu!', 'error' );</script>";
			include_once("includes/footer.php");
			print "<meta http-equiv='refresh' content='0; ./?NBKJudge=login'>";
			exit;
		}
		//Start session
		$_SESSION['user_id'] = $hp_member['id'];
		$_SESSION['user_admin'] = $hp_member['admin'];
		// Thông báo đăng nhập thành công
		include_once("includes/header.php");
		print "<script>Swal.fire( 'Đăng nhập thành công!', 'Hệ thống đang chuyển hướng về trang chủ', 'success' );</script>";
		include_once("includes/footer.php");
		print "<meta http-equiv='refresh' content='0; ./'>";
	} else 
{ 
// Form đăng nhập
if (!isset($_SESSION['user_id'] )){
print <<<EOF
<section class="forms">
    <div class="container-fluid">
        <!-- Page Header-->
        <header> 
            <h1 class="h3 display">ĐĂNG NHẬP</h1>
        </header>
        <div class="row">
            <div style="float: none; margin: 0 auto;">
				<div class="col-lg-12">
					<div class="card">	
						<div class="card-header">
							<h4><center>Đăng nhập - NBK Judge</center></h4>
						</div>
						<div class="card-body">
							<form action="login.php?action=login" method="post">
								<div class="form-group">
									<label>Tên đăng nhập:</label>
									<input type="text" placeholder="Tên đăng nhập" name="username" class="form-control">
								</div>
								<div class="form-group">       
									<label>Mật khẩu:</label>
									<input type="password" placeholder="Mật khẩu" name="password" class="form-control">
								</div>
								<br>
								<div class="form-group">       
									<center><input type="submit" name="submit" value="Đăng nhập" class="btn btn-primary"></center>
								</div>
							</form>
						</div>     
					</div>
				</div>
			</div>		
        </div>
    </div>
</section>
EOF;
} else {
	include_once("includes/header.php");
	print "<script>Swal.fire('Đã đăng nhập với tên {$hp_member['username']}', 'Hệ thống đang chuyển hướng về trang chủ', 'success' );</script>";
	include_once("includes/footer.php");
	print "<meta http-equiv='refresh' content='0; ./'>";
}
}
?> 
<?php include_once("includes/footer.php"); ?>
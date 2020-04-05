<?php //Code by Hung Phu - Update 04/04/2020
	include_once("includes/header.php");
	if(!isset($_GET["NBKJudge"])){$_GET["NBKJudge"]='';}
	if (!$_SESSION['user_id']){ 
		print "<script>Swal.fire('Chưa đăng nhập!', 'Hệ thống đang chuyển hướng về trang đăng nhập', 'error' );</script>";
		include_once("includes/footer.php");
		print "<meta http-equiv='refresh' content='0; ./?NBKJudge=login'>";
		exit;
	} else {
		//Check admin
		$user_id = intval($_SESSION['user_id']);
		$hp_sql_query = "SELECT * FROM ".$hp_main_table." WHERE id='{$user_id}'";
		$hp_get_member = $db_connect->query($hp_sql_query); 
		$hp_member = $hp_get_member->fetch_assoc();
		if ($hp_member['admin'] != "1"){
			print "<script>Swal.fire('Bạn không có quyền ADMIN!', 'Hệ thống đang chuyển hướng về trang chủ', 'error' );</script>";
			include_once("includes/footer.php");
			print "<meta http-equiv='refresh' content='0; ./'>";
			exit;
		} else {
		//Main
			$hp_sql_query = "SELECT * FROM ".$hp_main_table;
			$hp_result = mysqli_query($db_connect, $hp_sql_query);
			$hp_user_select = $_GET['username'];
			if ($_GET['action']=="reset_password"){
				$hp_query_sql_reset = "UPDATE ".$hp_main_table." SET password = '".$hp_main_default_pass_user."' WHERE username = '".$hp_user_select."'";
				mysqli_query($db_connect, $hp_query_sql_reset);
				print "<script>Swal.fire( 'Reset thành công!', 'Mật khẩu của ".$hp_user_select." được đổi thành: 123', 'success' );</script>";
				include_once("includes/footer.php");
				print "<meta http-equiv='refresh' content='0; ./?NBKJudge=listmember'>";
				exit;
			}
			if ($_GET['action']=="delete_user"){
				$hp_query_sql_delete = "DELETE FROM ".$hp_main_table." WHERE username = '".$hp_user_select."'";
				mysqli_query($db_connect, $hp_query_sql_delete);
				print "<script>Swal.fire( 'Xóa tài khoản thành công!', 'Đã xóa user ".$hp_user_select."', 'success' );</script>";
				include_once("includes/footer.php");
				print "<meta http-equiv='refresh' content='0; ./?NBKJudge=listmember'>";
				exit;
			}
		}
	}
	
?>
<section class="forms">
		<div class="container-fluid">  
			<header> 
				<h1 class="h3 display">DANH SÁCH THÀNH VIÊN: <b><?php echo $hp_main_table; if ($hp_main_data_setting['short_name']!= "") echo " | ".$hp_main_data_setting['short_name'];?></h1>
			</header>
			<div class="table-responsive">  
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
							   <th>ID</th>
							   <th>Tài khoản</th>
							   <th>Họ và tên</th>
							   <th>Email</th>
							   <th>Số điện thoại</th>
							   <th>Ngày sinh</th>
							   <th>Mật khẩu</th>
							   <th>Hành động</th>
							</tr>
						</thead>
						<tbody>
<?php
	while($hp_row_data = mysqli_fetch_array($hp_result)){
		if ($hp_row_data["username"] != "admin"){
			$date = date_create($hp_row_data["birthday"]);
			echo '
				<tr>
					<td>'.$hp_row_data["id"].'</td>
					<td>'.$hp_row_data["username"].'</td>
					<td>'.$hp_row_data["name"].'</td>
					<td>'.$hp_row_data["email"].'</td>
					<td>'.$hp_row_data["phone"].'</td>
					<td>'.date_format($date,'d/m/Y').'</td>
					<td>
						<form action="./listmember.php?action=reset_password&username='.$hp_row_data["username"].'" method="post">
							<div class="form-group">       
								<center><input type="submit" name="submit" value="Reset" class="btn btn-primary"></center>
							</div>
						</form>
					</td>
					<td>
						<form action="./listmember.php?action=delete_user&username='.$hp_row_data["username"].'" method="post">
							<div class="form-group">       
								<center><input type="submit" name="submit" value="Xóa" class="btn btn-primary"></center>
							</div>
						</form>
					</td>
				</tr>
			';
		}
    }
?>
						</tbody>
					</table>
			</div>  
		</div>  
<section>
<script language="javascript" type="text/javascript">
//Swal.fire( 'Xóa thành công!', 'Hệ thống đang chuyển hướng về trang admin', 'success' );
function reset_password(username){
	var x = username;
	alert(x);
}
function delete_user(username) {
	alert(username);
}
</script>	
<?php include_once("includes/footer.php"); ?>
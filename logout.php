<?php //Code by Hung Phu - Update 03/04/2020
	include_once("includes/header.php"); 
	if (session_destroy()){
		print "<script>Swal.fire( 'Đăng xuất thành công!', 'Hệ thống đang chuyển hướng về trang chủ', 'success' );</script>";
		print "<meta http-equiv='refresh' content='0; ./'>";
	} else {
		print "<script>Swal.fire( 'Đăng xuất thất bại!', 'Hệ thống đang chuyển hướng về trang chủ', 'error' );</script>";
		print "<meta http-equiv='refresh' content='0; ./'>";
	}
	include_once("includes/footer.php");
?>
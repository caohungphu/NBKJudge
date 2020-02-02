<?php //Code by Hung Phu - Update: 7/10/2019
	include_once("includes/header.php");
	$hp_sql_query = "SELECT * FROM caidat WHERE id='1'";
	$hp_get_setting = $db_connect->query($hp_sql_query); 
	$hp_setting = $hp_get_setting->fetch_assoc();
	$hp_table = "{$hp_setting['cosodulieu']}";
	$hp_sql_query_2 = "SELECT * FROM data WHERE tentable='{$hp_table}'"; 
	$hp_get_data = $db_connect->query($hp_sql_query_2); 
	$hp_data = $hp_get_data->fetch_assoc();
	//Get thong bao
	$adminarlert = $hp_setting['adminarlert'];
	$adminarlert2 = $hp_setting['adminarlert2'];
	$adminarlert3 = $hp_setting['adminarlert3'];
?>
<br>

<section class="forms">
    <div class="container-fluid">
        <div class="row">
			<div class="col-lg-12">
					<div class="card">	
						<div class="card-header">
							<h1><center><?php if ($hp_data['title'] != '') echo $hp_data['title'];?></center></h1>
						</div>
						<div class="card-body">
							<center><img src="img/logo_png.png" height="250px" width="250px" alt="image" draggable="false"></center>
						</div>						
						<h3><p><center><?php if ($hp_data['description'] != '') echo $hp_data['description']; ?></center></p></h3>
					</div>
			</div>	
        </div>
    </div>
</section>
<?php //Code by Hung Phu - Notify
	//Muc 1
if ($adminarlert != ""){	

print <<<EOF
<script>
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "6000",
  "extendedTimeOut": "2000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
toastr["info"]("{$adminarlert}", "Thông báo:")
</script>
EOF;
}
	//Muc 2
if ($adminarlert2 != ""){

print <<<EOF
<script>
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "6000",
  "extendedTimeOut": "2000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
toastr["warning"]("{$adminarlert2}", "Thông báo:")
</script>
EOF;
		
}
	//Muc 3
if ($adminarlert3 != ""){

print <<<EOF
<script>
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "6000",
  "extendedTimeOut": "2000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
toastr["error"]("{$adminarlert2}", "Thông báo:")
</script>
EOF;

}
	

?>
<?php include_once("includes/footer.php"); ?>
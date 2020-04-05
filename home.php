<?php //Code by Hung Phu - Update 03/04/2020
	include_once("includes/header.php");
	//Get data home
	$hp_home_title = $hp_main_data_setting['title'];
	$hp_home_description = $hp_main_data_setting['description'];
	$hp_home_noti_1 = $hp_main_setting['adminarlert'];
	$hp_home_noti_2 = $hp_main_setting['adminarlert2'];
	$hp_home_noti_3 = $hp_main_setting['adminarlert3'];
?>
<br>
<section class="forms">
    <div class="container-fluid">
        <div class="row">
			<div class="col-lg-12">
					<div class="card">	
						<div class="card-header">
							<h1><center><?php echo $hp_home_title; ?></center></h1>
						</div>
						<div class="card-body">
							<center><img src="<?php echo $hp_main_info_school_logo; ?>" height="250px" width="250px" alt="Logo" draggable="false"></center>
						</div>						
						<h3><p><center><?php echo $hp_home_description; ?></center></p></h3>
					</div>
			</div>	
        </div>
    </div>
</section>
<?php //Code by Hung Phu - Notify
//Level 1
if ($hp_home_noti_1 != ""){	
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
toastr["info"]("{$hp_home_noti_1}", "Thông báo:")
</script>
EOF;
}
//Level 2
if ($hp_home_noti_2 != ""){
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
toastr["warning"]("{$hp_home_noti_2}", "Thông báo:")
</script>
EOF;		
}
//Level 3
if ($hp_home_noti_3 != ""){
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
toastr["error"]("{$hp_home_noti_3}", "Thông báo:")
</script>
EOF;
}
?>
<?php include_once("includes/footer.php"); ?>
﻿<?php //Code by Hung Phu - Update 03/04/2020	include_once("includes/header.php"); ?><section class="forms">    <div class="container-fluid">        <!-- Page Header-->        <header>             <h1 class="h3 display">THÔNG TIN <?php echo strtoupper($hp_main_info_name); ?></h1>        </header>        <div class="row"><div class="col-lg-6">          <div class="card-body">            <div class="h4 mt-0 title">ABOUT ME:</div>			<div class="row mt-3">              <div class="col-sm-4"><strong class="text-uppercase">Name:</strong></div>              <div class="col-sm-8">Cao Hưng Phú</div>            </div>            <div class="row mt-3">              <div class="col-sm-4"><strong class="text-uppercase">Age:</strong></div>              <div class="col-sm-8">				<script type="text/javascript">					var d = new Date();					document.write(d.getFullYear()-2001);				</script>			  </div>            </div>			<div class="row mt-3">              <div class="col-sm-4"><strong class="text-uppercase">Email:</strong></div>              <div class="col-sm-8">caohungphuvn@gmail.com</div>            </div>			<div class="row mt-3">              <div class="col-sm-4"><strong class="text-uppercase">Facebook:</strong></div>              <div class="col-sm-8"><a href="https://facebook.com/caohungphuvn" target="_blank">https://facebook.com/caohungphuvn</a></div>            </div>            <div class="row mt-3">              <div class="col-sm-4"><strong class="text-uppercase">Website:</strong></div>              <div class="col-sm-8"><a href="https://caohungphu.github.io" target="_blank">https://caohungphu.github.io</a></div>            </div>          </div></div><div class="col-lg-6">          <div class="card-body">            <div class="h4 mt-0 title">ABOUT <?php echo strtoupper($hp_main_info_name); ?>:</div>			<div class="row mt-3">              <div class="col-sm-4"><strong class="text-uppercase">Name:</strong></div>              <div class="col-sm-8"><?php echo $hp_main_info_name; ?></div>            </div>			<div class="row mt-3">              <div class="col-sm-4"><strong class="text-uppercase">Version Themis:</strong></div>              <div class="col-sm-8">1.9.8.2806</div>            </div>            <div class="row mt-3">              <div class="col-sm-4"><strong class="text-uppercase">Version <?php echo $hp_main_info_name; ?>:</strong></div>              <div class="col-sm-8">2.0</div>            </div>          </div></div>		</div>	</div></section><?php include_once("includes/footer.php"); ?>
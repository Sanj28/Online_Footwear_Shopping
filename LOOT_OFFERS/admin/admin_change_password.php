<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<?php session_start();?>
<head>
<?php include_once("1_meta_tags.php"); ?>
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">

<!-- BEGIN: Header-->
<?php include_once("2_header.php"); ?>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<?php include_once("3_sidebar.php"); ?>
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content">
<div class="content-overlay"></div>
<div class="content-wrapper">
<div class="content-header row">
<div class="content-header-left col-12 mb-2 mt-1">
<!--
<div class="row breadcrumbs-top">
<div class="col-12">
<h5 class="content-header-title float-left pr-1 mb-0">Form Layouts</h5>
<div class="breadcrumb-wrapper col-12">
<ol class="breadcrumb p-0 mb-0">
<li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
</li>
<li class="breadcrumb-item"><a href="#">Forms</a>
</li>
<li class="breadcrumb-item active"><a href="#">Form Layouts</a>
</li>
</ol>
</div>
</div>
</div>
-->
</div>
</div>
<div class="content-body">
<!-- Basic Horizontal form layout section start -->
<section id="basic-horizontal-layouts">
<div class="row match-height">
<div class="col-md-2 col-12"></div>
<div class="col-md-8 col-12">
<div class="card">
<div class="card-header">
<center><h4 class="card-title">CHANGE PASSWORD</h4></center>
</div>
<div class="card-content">
<div class="card-body">

<form class="form form-horizontal" action="change_password_check.php" enctype="multipart/form-data" method="post" onsubmit="return ValidateForm();">
<div class="form-body">
<div class="row">

<div class="col-md-12 form-group">
<label>USERNAME</label>
<input class="form-control" type="text" name="ad_username" id="ad_username" placeholder="Username" value="<?php echo $_SESSION["ad_username"];?>" readonly>
<span id="ad_username_error"></span>
</div>

<div class="col-md-12 form-group">
<label>OLD PASSWORD</label>
<input class="form-control" type="password" name="old_password" id="old_password" placeholder="Old password">
<span id="old_password_error"></span>
</div>

<div class="col-md-12 form-group">
<label>NEW PASSWORD</label>
<input class="form-control" type="password" name="new_password" id="new_password" placeholder="New password">
<span id="new_password_error"></span>
</div>

<div class="col-md-12 form-group">
<label>CONFIRM PASSWORD</label>
<input class="form-control" type="password" name="con_password" id="con_password" placeholder="Confirm password">
<span id="con_password_error"></span>
</div>


<div class="col-sm-12 d-flex justify-content-start">
<button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
<button type="reset" class="btn btn-primary mr-1 mb-1">Reset</button>
<button type="button" class="btn btn-primary mr-1 mb-1" onclick="window.location.href='index.php'">Cancel</button>
</div>

</div>
</div>
</form>

</div>
</div>
</div>
</div>
<div class="col-md-2 col-12"></div>
</div>
</section>
<!-- // Basic Horizontal form layout section end -->

</div>
</div>
</div>
<!-- END: Content-->

<!-- demo chat-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<?php include_once("4_footer_name.php"); ?>
<!-- END: Footer-->


<?php include_once("4_footer_scripts.php"); ?>
<script type="text/javascript">
	function ValidateForm()
	{
		var ad_username='';
		var old_password='';
		var new_password='';
		var con_password='';
        
		ad_username=fieldrequired('ad_username','ad_username_error','Username');
		old_password=pasword('old_password','old_password_error','Old Password');
		new_password=pasword('new_password','new_password_error','New Password');
		con_password=pasword('new_password','con_password_error','Confirm Password');
		
        if(ad_username==1 && old_password==1 && new_password==1 && con_password==1)                     {
			return true;
		}
		else
		{
			return false;
		}
	}
	
</script>

</body>
<!-- END: Body-->

</html>



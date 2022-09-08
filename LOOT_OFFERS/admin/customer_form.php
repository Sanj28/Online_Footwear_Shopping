<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

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
<center><h4 class="card-title">CUSTOMER</h4></center>
</div>
<div class="card-content">
<div class="card-body">

<form class="form form-horizontal" action="customer_insert.php" enctype="multipart/form-data" method="post" onsubmit="return ValidateForm();">
<div class="form-body">
<div class="row">

<div class="col-md-12 form-group">
<label>Name</label>
<input type="text" class="form-control" name="cu_name" id="cu_name" placeholder="Name">
<span id="cu_name_error"></span>
</div>

<div class="col-md-12 form-group">
<label>Contact</label>
<input type="text" class="form-control" name="cu_contact" id="cu_contact" placeholder="Contact">
<span id="cu_contact_error"></span>
</div>
<div class="col-md-12 form-group">
<label>Adress</label>
<!--<input type="text" class="form-control" name="ad_adress" id="ad_adress" placeholder="Adress">-->
<textarea  class="form-control" name="cu_address" id="cu_address" placeholder="Adress"></textarea>
<span id="cu_address_error"></span>
</div>

<div class="col-md-12 form-group">
<label>Email</label>
<input type="text" class="form-control" name="cu_email" id="cu_email" placeholder="Email">
<span id="cu_email_error"></span>
    </div>

<div class="col-md-12 form-group">
<label>Username</label>
<input type="text" class="form-control" name="cu_username" id="cu_username" placeholder="Username">
<span id="cu_username_error"></span>
    </div>

<div class="col-md-12 form-group">
<label>Password</label>
<input type="password" class="form-control" name="cu_password" id="cu_password" placeholder="Password">
<span id="cu_password_error"></span>
    </div>

<div class="col-md-12 form-group">
<label>Date</label>
<input type="date" class="form-control" name="cu_date" id="cu_date" placeholder="Date">
<span id="cu_date_error"></span>
    </div>



<div class="col-sm-12 d-flex justify-content-start">
<button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
<button type="reset" class="btn btn-primary mr-1 mb-1">Reset</button>
<button type="button" class="btn btn-primary mr-1 mb-1" onclick="window.location.href='customer_view.php'">Cancel</button>
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
		var cu_name='';
		var cu_contact='';
		var cu_address='';
		var cu_email='';
        var cu_username='';
		var cu_password='';
        var cu_date='';
		cu_name=alphabets('cu_name','cu_name_error','Name');
        
		cu_contact=phoneno('cu_contact','cu_contact_error','Contact');
        
        cu_address=fieldrequired('cu_address','cu_address_error','Address');
        
        cu_email=emailid('cu_email','cu_email_error','Email');
        
        cu_username=fieldrequired('cu_username','cu_username_error','Username');
        
        cu_password=pasword('cu_password','cu_password_error','Password');
       
        cu_date=fieldrequired('cu_date','cu_date_error','Date');
        
        
		if(cu_name==1 && cu_contact==1 && cu_address==1 && cu_email==1 && cu_username==1 && cu_password==1 && cu_date==1)
		{
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




























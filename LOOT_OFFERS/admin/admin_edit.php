<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
<?php include_once("1_meta_tags.php");?>
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
<center><h4 class="card-title">ADMIN</h4></center>
</div>
<div class="card-content">
<div class="card-body">
<?php
     $ad_username=$_SESSION["ad_username"];
      $sql=$conn->prepare("SELECT * FROM admin WHERE ad_username=?");
      $sql->bind_param("s",$ad_username);
      $sql->execute();
      $result=$sql->get_result();
      $row=$result->fetch_assoc();
    ?>
<form class="form form-horizontal" action="admin_update.php" enctype="multipart/form-data" method="post" onsubmit="return ValidateForm();">
<input type="hidden" name="ad_id" id="ad_id" value="<?php echo $row["ad_id"];?>">
<div class="form-body">
<div class="row">

<div class="col-md-12 form-group">
<label>Name</label>
<input type="text" class="form-control" name="ad_name" id="ad_name" value="<?php echo $row["ad_name"];?>">
<span id="ad_name_error"></span>
</div>

<div class="col-md-12 form-group">
<label>Contact</label>
<input type="text" class="form-control" name="ad_contact" id="ad_contact" value="<?php echo $row["ad_contact"];?>">
<span id="ad_contact_error"></span>

</div>
<div class="col-md-12 form-group">
<label>Address</label>
<textarea  class="form-control" name="ad_address" id="ad_address"><?php echo $row['ad_address'];?></textarea>
<span id="ad_address_error"></span>
</div>

<div class="col-md-12 form-group">
<label>Email</label>
<input type="text" class="form-control" name="ad_email" id="ad_email" value="<?php echo $row["ad_email"];?>">
<span id="ad_email_error"></span>
    </div>
    

    
<div class="col-md-12 form-group">
<label>Date</label>
<input type="date" class="form-control" name="ad_date" id="ad_date" value="<?php echo date('Y-m-d')?>">
<span id="ad_date_error"></span>
    </div>


<div class="col-sm-12 d-flex justify-content-start">
<button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
<button type="reset" class="btn btn-primary mr-1 mb-1">Reset</button>
<!--<button type="button" class="btn btn-primary mr-1 mb-1" onclick="window.location.href='view.php'">Cancel</button>-->
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
		var ad_name='';
		var ad_contact='';
        var ad_address='';
        var ad_email='';
        var ad_date='';
		ad_name=alphabets('ad_name','ad_name_error','Name');
        
		ad_contact=phoneno('ad_contact','ad_contact_error','Contact');
        
        ad_address=fieldrequired('ad_address','ad_address_error','Address');
        
        ad_email=emailid('ad_email','ad_email_error','Email');
        
        ad_date=fieldrequired('ad_date','ad_date_error','Date');
                
        
		if(ad_name==1 && ad_contact==1 && ad_address==1 && ad_email==1 && ad_date==1)
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


















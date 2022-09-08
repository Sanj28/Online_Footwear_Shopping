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
<center><h4 class="card-title">EXTRA CHARGES</h4></center>
</div>
<div class="card-content">
<div class="card-body">
<?php
        $ec_id=$_REQUEST["id"];
        $sql=$conn->prepare("SELECT * FROM extra_charges WHERE ec_id=?");
        $sql->bind_param("i",$ec_id);
        $sql->execute();
        $result=$sql->get_result();
        $row=$result->fetch_assoc();
   ?>
<form class="form form-horizontal" action="extra_charges_update.php" enctype="multipart/form-data" method="post" onsubmit="return ValidateForm();">
<input type="hidden" name="ec_id" id="ec_id" value="<?php echo $row["ec_id"];?>">
<div class="form-body">
<div class="row">

<div class="col-md-12 form-group">
<label>Minimum Amount</label>
<input type="text" class="form-control" name="ec_min_amount" id="ec_min_amount" value="<?php echo $row['ec_min_amount'];?>">
<span id="ec_min_amount_error"></span>
</div>

<div class="col-md-12 form-group">
<label>Delivary Charges</label>
<input type="text" class="form-control" name="ec_delivery_charges" id="ec_delivery_charges" value="<?php echo $row['ec_delivery_charges'];?>">
<span id="ec_delivery_charges_error"></span>
</div>

<div class="col-md-12 form-group">
<label>Minimum Stock</label>
<input type="text" class="form-control" name="ec_min_stock_qty" id="ec_min_stock_qty" value="<?php echo $row['ec_min_stock_qty'];?>">
<span id="ec_min_stock_qty_error"></span>
</div>

<div class="col-md-12 form-group">
<label>Date</label>
<input type="date" class="form-control" name="ec_date" id="ec_date" placeholder="Date" value="<?php echo date('Y-m-d')?>">
<span id="ec_date_error"></span>
    </div>



<div class="col-sm-12 d-flex justify-content-start">
<button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
<button type="reset" class="btn btn-primary mr-1 mb-1">Reset</button>
<button type="button" class="btn btn-primary mr-1 mb-1" onclick="window.location.href='view.php'">Cancel</button>
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
		var ec_min_amount='';
		var ec_delivery_charges='';
		var ec_min_stock_qty='';
        var ec_date='';
        
        ec_min_amount=amountval('ec_min_amount','ec_min_amount_error','Minimum Amount');
        
		ec_delivery_charges=amountval('ec_delivery_charges','ec_delivery_charges_error','Delivery Charges');
        
		ec_min_stock_qty=amountval('ec_min_stock_qty','ec_min_stock_qty_error','Minimum Stock');
        
        ec_date=fieldrequired('ec_date','ec_date_error','Date');
		
		if(ec_min_amount==1 && ec_delivery_charges==1 && ec_min_stock_qty==1 && ec_date==1)
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












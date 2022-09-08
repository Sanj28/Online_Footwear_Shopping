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
<center><h4 class="card-title">PRODUCT TYPE</h4></center>
</div>
<div class="card-content">
<div class="card-body">

<form class="form form-horizontal" action="product_type_insert.php" enctype="multipart/form-data" method="post" onsubmit="return ValidateForm();">
<div class="form-body">
<div class="row">

<div class="col-md-12 form-group">
<label>Product Category</label>
<select name="pc_id" id="pc_id" class="form-control">
<option value="">--SELECT--</option>
<?php 
$sql=$conn->prepare("SELECT * FROM product_category");
$sql->execute();
$result=$sql->get_result();
while($row=$result->fetch_assoc())
{   ?>

<option value="<?php echo $row["pc_id"];?>"><?php echo $row["pc_name"];?></option>
<?php
}
?>
</select>
<span id="pc_id_error"></span>
</div>

<div class="col-md-12 form-group">
<label>Name</label>
<input type="text" class="form-control" name="pt_name" id="pt_name" placeholder="Name">
<span id="pt_name_error"></span>
</div>

<div class="col-md-12 form-group">
<label>Date</label>
<input type="date" class="form-control" name="pt_date" id="pt_date" placeholder="Date" value="<?php echo date('Y-m-d')?>">
<span id="pt_date_error"></span>
    </div>


<div class="col-sm-12 d-flex justify-content-start">
<button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
<button type="reset" class="btn btn-primary mr-1 mb-1">Reset</button>
<button type="button" class="btn btn-primary mr-1 mb-1" onclick="window.location.href='product_type_view.php'">Cancel</button>
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
		var pc_id='';
		var pt_name='';
		var pt_date='';
		pc_id=fieldrequired('pc_id','pc_id_error','Product Category');
		pt_name=alphabets('pt_name','pt_name_error','Name');
		pt_date=fieldrequired('pt_date','pt_date_error','Name');
		if(pc_id==1 && pt_name==1 && pt_date==1)
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












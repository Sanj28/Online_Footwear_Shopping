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
<center><h4 class="card-title">STOCK DETAILS</h4></center>
</div>
<div class="card-content">
<div class="card-body">
<?php 
$sd_id=$_REQUEST["id"];
$sql=$conn->prepare("SELECT * FROM stock_details WHERE sd_id=?");
$sql->bind_param("i",$sd_id);
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_assoc();
?>

<form class="form form-horizontal" action="stock_details_update.php" enctype="multipart/form-data" method="POST" onsubmit="return ValidateForm();">

<input type="hidden" name="sd_id" id="sd_id" value="<?php echo $row["sd_id"];?>">
<div class="form-body">
<div class="row">

<div class="col-md-12 form-group">
<label>Product Name</label>
<select name="pd_id" id="pd_id" class="form-control">
<option value="">--SELECT--</option>
<?php 

$sql1=$conn->prepare("SELECT * FROM product_details");
$sql1->execute();
$result1=$sql1->get_result();
while($row1=$result1->fetch_assoc())
{   ?>

<option value="<?php echo $row1["pd_id"];?>"
<?php
if($row["pd_id"]==$row1["pd_id"]){
?>
selected
<?php     
}
?>
><?php echo $row1["pd_name"];?></option>
<?php
}
?>

</select>
<span id="pd_id_error"></span>
</div>

<div class="col-md-12 form-group">
<label>PRODUCT SIZE</label>
<select name="ps_id" id="ps_id" class="form-control">
<option value="">--SELECT--</option>
<?php
$sql2=$conn->prepare("SELECT * FROM product_size");
$sql2->execute();
$result2=$sql2->get_result();
while($row2=$result2->fetch_assoc())
{
?>
<option value="<?php echo $row2['ps_id']; ?>"
<?php 
if($row["ps_id"]==$row2["ps_id"])
{
?>
selected
<?php
}
?>
>
<?php echo $row2['ps_name']; ?>
</option>
<?php
}
?>
</select>
<span id="ps_id_error"></span>
</div>



<div class="col-md-12 form-group">
<label>UNIT PRICE</label>
<input type="text" class="form-control" placeholder="UNIT PRICE" name="pd_price" id="pd_price" readonly onkeyup="calculateprice()" value="<?php echo $row['sd_unitprice']-$row['sd_increment'];?>">
<span id="pd_price_error"></span>
</div>

<div class="col-md-12 form-group">
<label>INCREMENT AMOUNT</label>
<input type="text" class="form-control" placeholder="INCREMENT AMOUNT" name="sd_increment" id="sd_increment" onkeyup="calculateprice()" value="<?php echo $row['sd_increment'];?>">
<span id="sd_increment_error"></span>
</div>

<div class="col-md-12 form-group">
<label>TOTAL UNIT PRICE</label>
<input type="text" class="form-control" placeholder="TOTAL UNIT PRICE" name="sd_unitprice" id="sd_unitprice" readonly value="<?php echo $row['sd_unitprice'];?>">
<span id="sd_unitprice_error"></span>
</div>

<div class="col-md-12 form-group">
<label>DISCOUNT</label>
<input type="text"  class="form-control" placeholder="DISCOUNT" name="sd_discount" id="sd_discount" value="<?php echo $row['sd_discount'];?>">
<span id="sd_discount_error"></span>
</div>

<div class="col-md-12 form-group">
<label>AVAILABLE QUANTITY</label>
<input type="number" class="form-control" placeholder="AVAILABLE QUANTITY" name="sd_avail_qty" id="sd_avail_qty" min="1" value="<?php echo $row['sd_avail_qty'];?>">
<span id="sd_avail_qty_error"></span>
</div>

<div class="col-md-12 form-group">
<label>MAX ORDER QTY</label>
<input type="number"  class="form-control" placeholder="MAX ORDER QTY" name="sd_max_qty_order" id="sd_max_qty_order" min="1" value="<?php echo $row['sd_max_qty_order'];?>">
<span id="sd_max_qty_order_error"></span>
</div>

<div class="col-md-12 form-group">
<label>STATUS</label>
<select name="sd_status" id="sd_status" class="form-control">
<option value="">--SELECT--</option>
<option value="IN STOCK"  <?php 
if($row["sd_status"]=="IN STOCK")
{
?>
selected
<?php
}
?>>IN STOCK</option>
<option value="OUT OF STOCK"  <?php 
if($row["sd_status"]=="OUT OF STOCK")
{
?>
selected
<?php
}
?>>OUT OF STOCK</option>
</select>
<span id="sd_status_error"></span>
</div>

<div class="col-md-12 form-group">
<label>Date</label>
<input type="text" class="form-control" name="sd_date" id="sd_date" placeholder="Date" value="<?php echo date('Y-m-d')?>" readonly>
<span id="sd_date_error"></span>
</div>

<div class="col-sm-12 d-flex justify-content-start">
<button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
<button type="reset" class="btn btn-primary mr-1 mb-1">Reset</button>
<button type="button" class="btn btn-primary mr-1 mb-1" onclick="window.location.href='stock_details_view.php'">Cancel</button>
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
var pd_id = '';
var ps_id = '';
var sd_avail_qty = '';
var pd_price = '';
var sd_increment = '';
var sd_unitprice = '';
var sd_discount = '';
var sd_max_qty_order = '';
var sd_status = '';


pd_id = fieldrequired('pd_id', 'pd_id_error', 'PRODUCT');
    ps_id = fieldrequired('ps_id', 'ps_id_error', 'PRODUCT SIZE');
sd_avail_qty = numbers('sd_avail_qty', 'sd_avail_qty_error', 'AVAILABLE QUANTITY');
pd_price = numbers('pd_price', 'pd_price_error', 'UNIT PRICE');
sd_increment = numbers('sd_increment', 'sd_increment_error', 'INCREMENT');
    sd_unitprice = amountval('sd_unitprice', 'sd_unitprice_error', 'TOTAL UNIT PRICE');
sd_discount = amountval('sd_discount', 'sd_discount_error', 'DISCOUNT');
sd_max_qty_order = numbers('sd_max_qty_order', 'sd_max_qty_order_error', 'MAX ORDER QTY');
sd_status = fieldrequired('sd_status', 'sd_status_error', 'STATUS');


if (pd_id == 1 && ps_id == 1 && sd_avail_qty == 1 && pd_price==1 && sd_increment == 1 && sd_unitprice == 1 && sd_discount == 1 && sd_max_qty_order == 1 && sd_status == 1 ) 
{
return true;
}
else
{
return false;
}
}
	
	function calculateprice()
	{
		var price=document.getElementById("pd_price").value;
					var increment=document.getElementById("sd_increment").value;
				 $('#sd_unitprice').val(parseInt(price)+parseInt(increment)); 
	}
	
	$(document).ready(function() {
        $('#pd_id').on('change', function() {
            var pd_id = $(this).val();
            if (pd_id) {
                $.ajax({
                    type: 'POST',
                    url: 'ajaxMainCategory.php',
                    data: {pd_id:pd_id},
					dataType: "json",
                    success: function(html) {
					$('#pd_price').val(html.pd_price);
					var price=document.getElementById("pd_price").value;
					var increment=document.getElementById("sd_increment").value;
				 $('#sd_unitprice').val(parseInt(price)+parseInt(increment));   
                    }
                });
            } else {
		$('#pd_price').val(html.pd_price);
            var price=document.getElementById("pd_price").value;
					var increment=document.getElementById("sd_increment").value;
				 $('#sd_unitprice').val(parseInt(price)+parseInt(increment));   
            }
        });
		 });

</script>

</body>
<!-- END: Body-->

</html>
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
<center><h4 class="card-title">PRODUCT DETAILS</h4></center>
</div>
<div class="card-content">
<div class="card-body">

<form class="form form-horizontal" action="product_details_update.php" enctype="multipart/form-data" method="post" onsubmit="return ValidateForm();">
<?php 
include_once("../db_connection.php");
$pd_id=$_REQUEST["id"];
$sql=$conn->prepare("SELECT * FROM product_details WHERE pd_id=?");
$sql->bind_param("i",$pd_id);
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_assoc();
?>

<input type="hidden" name="pd_id" id="pd_id" value="<?php echo $row["pd_id"];?>">

<div class="form-body">
<div class="row">

<div class="col-md-12 form-group">
<label>Product Category</label>
<select name="pc_id" id="pc_id" class="form-control">
<option value="">------SELECT PRODUCT CATEGORY------</option>

<?php

$sql2=$conn->prepare("SELECT * FROM product_category");
$sql2->execute();
$result2=$sql2->get_result();
while($row2=$result2->fetch_assoc())
{
?>

<option value="<?php echo $row2["pc_id"]?>"
<?php 
if($row2["pc_id"]==$row["pc_id"]){
	?>
	selected
	<?php
	}
   ?>
><?php echo $row2["pc_name"];?>
</option>
<?php
} 
?>
</select>
<span id="pc_id_error"></span>
</div>

<div class="col-md-12 form-group">
<label>Product Type</label>
<select name="pt_id" id="pt_id" class="form-control">
<option value="">------SELECT PRODUCT TYPE------</option>
<?php
include_once("../db_connection.php");
$sql3=$conn->prepare("SELECT * FROM product_type WHERE pc_id=?");
$sql3->bind_param("i",$row["pc_id"]);
$sql3->execute();
$result3=$sql3->get_result();
while($row3=$result3->fetch_assoc())
{
?>

<option value="<?php echo $row3["pt_id"]?>"
<?php 
if($row3["pt_id"]==$row["pt_id"]){
	?>
	selected
	<?php
	}
   ?>
><?php echo $row3["pt_name"];?>
</option>
<?php
} 
?> 
</select>
<span id="pt_id_error"></span>
</div>

<div class="col-md-12 form-group">
<label>NAME</label>
<input class="form-control" type="text" name="pd_name" id="pd_name" value="<?php echo $row["pd_name"];?>">
<span id="pd_name_error"></span>
</div>

<div class="col-md-12 form-group">
<label>Image1</label>
<img src="photo/<?php echo $row["pd_image1"];?>" alt="NO IMAGE" height="100" width="100"><br>
<input type="hidden" name="old_pd_image1" id="old_pd_image1" value="<?php echo $row["pd_image1"];?>"><br>
<input type="file" name="pd_image1" id="pd_image1" class="form-control">
<span id="pd_image1_error"></span>
</div>

<div class="col-md-12 form-group">
<label>Image2</label>
<img src="photo/<?php echo $row["pd_image2"];?>" alt="NO IMAGE" height="100" width="100"><br>
<input type="hidden" name="old_pd_image2" id="old_pd_image2" value="<?php echo $row["pd_image2"];?>"><br>
<input type="file" name="pd_image2" id="pd_image2" class="form-control">
<span id="pd_image2_error"></span>
</div>

<div class="col-md-12 form-group">
<label>Image3</label>
<img src="photo/<?php echo $row["pd_image3"];?>" alt="NO IMAGE" height="100" width="100"><br>
<input type="hidden" name="old_pd_image3" id="old_pd_image3" value="<?php echo $row["pd_image3"];?>"><br>
<input type="file" name="pd_image3" id="pd_image3" class="form-control">
<span id="pd_image3_error"></span>
</div>

<div class="col-md-12 form-group">
<label>Image4</label>
<img src="photo/<?php echo $row["pd_image4"];?>" alt="NO IMAGE" height="100" width="100"><br>
<input type="hidden" name="old_pd_image4" id="old_pd_image4" value="<?php echo $row["pd_image4"];?>"><br>
<input type="file" name="pd_image4" id="pd_image4" class="form-control">
<span id="pd_image4_error"></span>
</div>

<div class="col-md-12 form-group">
<label>DESCRIPTION</label>
<textarea class="form-control" name="pd_description" id="pd_description"><?php echo $row["pd_description"];?></textarea>
<script type="text/javascript">CKEDITOR.replace('pd_description');</script>
<span id="pd_description_error"></span>
</div>

<div class="col-md-12 form-group">
<label>PRICE</label>
<input type="text" class="form-control" placeholder="PRICE" name="pd_price" id="pd_price" value="<?php echo $row["pd_price"];?>">
<span id="pd_price_error"></span>
</div>

<div class="col-md-12 form-group">
<label>Date</label>
<input type="date" class="form-control" name="pd_date" id="pd_date" placeholder="Date" value="<?php echo date('Y-m-d')?>">
<span id="pd_date_error"></span>
</div>



<div class="col-sm-12 d-flex justify-content-start">
<button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
<button type="reset" class="btn btn-primary mr-1 mb-1">Reset</button>
<button type="button" class="btn btn-primary mr-1 mb-1" onclick="window.location.href='product_details_view.php'">Cancel</button>
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
var pt_id='';
var pd_name='';
var pd_image1='';
var pd_image2='';
var pd_image3='';
var pd_image4='';
var pd_description='';
var pd_price='';
var pd_date='';

pc_id=fieldrequired('pc_id','pc_id_error','Product Category');
pt_id=fieldrequired('pt_id','pt_id_error','Product Type');

pd_name=alphabets('pd_name','pd_name_error','Product Name');
if(document.getElementById('pd_image1').value=="")
{
pd_image1=1; 
}
else
{
pd_image1=imagename('pd_image1','pd_image1_error','Image1');  
}
if(document.getElementById('pd_image2').value=="")
{
pd_image2=1; 
}
else
{
pd_image2=imagename('pd_image2','pd_image2_error','Image2');
}
if(document.getElementById('pd_image3').value=="")
{
pd_image3=1; 
}
else
{
pd_image3=imagename('pd_image3','pd_image3_error','Image3');
}
if(document.getElementById('pd_image4').value=="")
{
pd_image4=1; 
}
else
{
pd_image4=imagename('pd_image4','pd_image4_error','Image4');
} 
pd_description=ckeditor_val('pd_description','pd_description_error','Description');
pd_price = amountval('pd_price', 'pd_price_error', 'Price');

pd_date=fieldrequired('pd_date','pd_date_error','Date');  

if(pc_id==1 && pt_id==1 && pd_name==1 && pd_image1==1 && pd_image2==1 && pd_image3==1 && pd_image4==1 && pd_description==1 && pd_price==1 && pd_date==1)
{
return true;
}
else
{
return false;
}
}
	
	$(document).ready(function() {
        $('#pc_id').on('change', function() {
            var pc_id = $(this).val();
            if (pc_id) {
                $.ajax({
                    type: 'POST',
                    url: 'ajaxMainCategory.php',
                    data: {pc_id:pc_id},
					dataType: "json",
                    success: function(data) {
                        $('#pt_id').html(data.subdata);
                    }
                });
            } else {
		$('#pt_id').html('<option value="">--SELECT PRODUCT CATEGORY FIRST--</option>');
               
            }
        });
		 });

</script>

</body>
<!-- END: Body-->

</html>
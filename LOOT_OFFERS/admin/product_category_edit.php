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
<center><h4 class="card-title">PRODUCT CATEGORY</h4></center>
</div>
<div class="card-content">
<div class="card-body">
     <?php
       $pc_id=$_REQUEST["id"];
        $sql=$conn->prepare("SELECT * FROM product_category WHERE pc_id=?");
        $sql->bind_param("i",$pc_id);
        $sql->execute();
        $result=$sql->get_result();
        $row=$result->fetch_assoc();
       ?>
<form class="form form-horizontal" action="product_category_update.php" enctype="multipart/form-data" method="post" onsubmit="return ValidateForm();">
<input type="hidden" name="pc_id" id="pc_id" value="<?php echo $row["pc_id"];?>">
<div class="form-body">
<div class="row">

<div class="col-md-12 form-group">
<label>Product Name</label>
<input type="text" class="form-control" name="pc_name" id="pc_name" value="<?php echo $row["pc_name"];?>">
<span id="pc_name_error"></span>

</div><div class="col-md-12 form-group">
<label>Discount</label>
<input type="text" class="form-control" name="pc_discount" id="pc_discount" value="<?php echo $row["pc_discount"];?>" >
<span id="pc_discount_error"></span>
</div>




<div class="col-sm-12 d-flex justify-content-start">
<button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
<button type="reset" class="btn btn-primary mr-1 mb-1">Reset</button>
<button type="button" class="btn btn-primary mr-1 mb-1" onclick="window.location.href='product_category_view.php'">Cancel</button>
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
		var pc_name='';
		var pc_discount='';
        pc_name=alphabets('pc_name','pc_name_error','Product Name');
		pc_discount=amountval('pc_discount','pc_discount_error','Discount');
        
		if(pc_name==1 && pc_discount==1)
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

                








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Catgeory</title>
</head>
<body>
    <center>
       <?php
        include_once("../db_connection.php");
        $pc_id=$_REQUEST["id"];
        $sql=$conn->prepare("SELECT * FROM product_category WHERE pc_id=?");
        $sql->bind_param("i",$ad_id);
        $sql->execute();
        $result=$sql->get_result();
        $row=$result->fetch_assoc();
       ?>
        <form action="product_category_update.php" method="post">
           
            <table border="3">
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="pc_name" id="pc_name" value="<?php echo $row["pc_name"];?>"></td>
                </tr>
                <tr>
                    <td>Discount</td>
                    <td><input type="text" name="pc_discount" id="pc_discount" value="<?php echo $row["pc_discount"];?>"></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit">
                        <input type="reset">
                    </td>
                </tr>
            </table>
        </form>
    </center>
</body>
</html>
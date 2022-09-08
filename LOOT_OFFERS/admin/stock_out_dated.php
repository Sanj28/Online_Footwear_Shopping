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
<div class="row breadcrumbs-top">
<!--
<div class="col-12">
<h5 class="content-header-title float-left pr-1 mb-0">DataTables</h5>
<div class="breadcrumb-wrapper col-12">
<ol class="breadcrumb p-0 mb-0">
<li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
</li>
<li class="breadcrumb-item active">Datatable
</li>
</ol>
</div>
</div>
-->
</div>
</div>
</div>

<div class="content-body">

<!-- Zero configuration table -->
<section id="basic-datatable">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h4 class="card-title" style="float:left;">OUT OF STOCK DETAILS</h4>
<!--<a href="stock_details_form.php"><h4 class="card-title" style="float:right;"><button class="btn btn-md btn-info">NEW</button></h4></a>-->
</div>
<div class="card-content">
<div class="card-body card-dashboard">
<div class="table-responsive">
<table class="table zero-configuration">
<thead>
<tr>
<th>Sl.No</th>
<th>Product Name</th>
<th>Stock Quantity</th>
<th>Max Quantity</th>
<th>Status</th>
<th>Edit</th>
</tr>
</thead>
<tbody>
<?php
//$sql1=$conn->prepare("SELECT * from extra_charges");
//$sql1->execute();
//$result1=$sql1->get_result();
//$row1=$result1->fetch_assoc();
//$min_stock_qty=$row1["ec_min_stock_qty"];        
$status="OUT OF STOCK";    
$sql=$conn->prepare("SELECT * from stock_details,product_details WHERE  stock_details.sd_status=? AND stock_details.pd_id=product_details.pd_id  ");
$sql->bind_param("s",$status);
$sql->execute();
$result=$sql->get_result();
$sno=1;
while($row=$result->fetch_assoc())
{
?>
<tr>
<td><?php echo $sno++; ?></td>
<td><?php echo $row["pd_name"];?></td>
<td><?php echo $row["sd_avail_qty"];?></td>
<td><?php echo $row["sd_max_qty_order"];?></td>
<td><button class="btn btn-sm btn-danger" style="width:100%;"><?php echo $row["sd_status"];?></button></td>
<td> 
<a class="btn btn-primary" href="stock_details_edit.php?id=<?php echo $row['sd_id'];?>">EDIT</a>
</td>
</tr>
<?php
}
?>

</tbody>

</table>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!--/ Zero configuration table -->




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

</body>
<!-- END: Body-->

</html>
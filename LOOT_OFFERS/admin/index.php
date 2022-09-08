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
<br><br>
</div>
<div class="content-body">
<!-- Dashboard Ecommerce Starts -->
<section id="dashboard-ecommerce">
<div class="row">

<div class="col-xl-12 col-12 dashboard-users">
<div class="row  ">
<!-- Statistics Cards Starts -->
<div class="col-12">
<div class="row">
<?php
$sql=$conn->prepare("SELECT * FROM customer ");
$sql->execute();
$result=$sql->get_result();
$cust_count=$result->num_rows;
?>
<div class="col-sm-4 col-12 dashboard-users-success">
<div class="card text-center">
<div class="card-content">
<div class="card-body py-1">
<div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
<i class="bx bx-user font-medium-"></i>
</div>
<div class="text-muted line-ellipsis">Customers</div>
<h3 class="mb-0"><?php echo $cust_count; ?></h3>
</div>
</div>
</div>
</div>

<?php
$sql=$conn->prepare("SELECT * FROM product_details ");
$sql->execute();
$result=$sql->get_result();
$prod_count=$result->num_rows;
?>
<div class="col-sm-4 col-12 dashboard-users-success">
<div class="card text-center">
<div class="card-content">
<div class="card-body py-1">
<div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
<i class="bx bx-briefcase-alt font-medium-5"></i>
</div>
<div class="text-muted line-ellipsis">Products</div>
<h3 class="mb-0"><?php echo $prod_count; ?></h3>
</div>
</div>
</div>
</div>
<?php
$sd_status="IN STOCK";
$sql1=$conn->prepare("SELECT * FROM stock_details WHERE sd_status=?");
$sql1->bind_param("s",$sd_status);
$sql1->execute();
$result1=$sql1->get_result();
$count1=$result1->num_rows;
?>
<div class="col-sm-4 col-12 dashboard-users-success">
<div class="card text-center">
<div class="card-content">
<div class="card-body py-1">
<div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
<i class="bx bx-briefcase-alt font-medium-5"></i>
</div>
<div class="text-muted line-ellipsis">Products In Stock</div>
<h3 class="mb-0"><?php echo $count1; ?></h3>
</div>
</div>
</div>
</div>

<?php
$sd_status="OUT OF STOCK";
$sql1=$conn->prepare("SELECT * FROM stock_details WHERE sd_status=?");
$sql1->bind_param("s",$sd_status);
$sql1->execute();
$result1=$sql1->get_result();
$count2=$result1->num_rows;
?>
<div class="col-sm-4 col-12 dashboard-users-success">
<div class="card text-center">
<div class="card-content">
<div class="card-body py-1">
<div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
<i class="bx bx-briefcase-alt font-medium-5"></i>
</div>
<div class="text-muted line-ellipsis">Products In Out of Stock</div>
<h3 class="mb-0"><?php echo $count2; ?></h3>
</div>
</div>
</div>
</div>

<?php
$status="ORDER PLACED";
$sql=$conn->prepare("SELECT * FROM customer_order_details WHERE order_status = ? ");
$sql->bind_param("s",$status);
$sql->execute();
$result=$sql->get_result();
$count=$result->num_rows;
?>
<div class="col-sm-4 col-12 dashboard-users-success">
<div class="card text-center">
<div class="card-content">
<div class="card-body py-1">
<div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
<i class="bx bx-message font-medium-5"></i>
</div>
<div class="text-muted line-ellipsis">New Orders</div>
<h3 class="mb-0"><?php echo $count; ?></h3>
</div>
</div>
</div>
</div>

<?php
$status="ORDER CONFIRMED";
$sql=$conn->prepare("SELECT SUM(order_grand_total) as order_grand_total FROM customer_order_details WHERE order_status = ? ");
$sql->bind_param("s",$status);
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_assoc();
?>
<div class="col-sm-4 col-12 dashboard-users-success">
<div class="card text-center">
<div class="card-content">
<div class="card-body py-1">
<div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
<i class="bx bx-trending-up font-medium-5"></i>
</div>
<div class="text-muted line-ellipsis">Total Revenue</div>
<h3 class="mb-0"><?php echo currencyFormat($row['order_grand_total']); ?></h3>
</div>
</div>
</div>
</div>

</div>
</div>
<!-- Revenue Growth Chart Starts -->
</div>
</div>
</div>




</section>
<!-- Dashboard Ecommerce ends -->

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
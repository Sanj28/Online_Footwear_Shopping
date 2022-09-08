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
<h4 class="card-title" style="float:left;">EXTRA CHARGES</h4>
<?php 
$sql=$conn->prepare("SELECT * FROM extra_charges");
$sql->execute();
$result=$sql->get_result();
$count=$result->num_rows;
if($count<=0)
{?>
<a href="extra_charges_form.php"><h4 class="card-title" style="float:right;"><button class="btn btn-md btn-info">NEW</button></h4></a>
<?php } ?>
</div>
<div class="card-content">
<div class="card-body card-dashboard">
<div class="table-responsive">
<table class="table zero-configuration">
<thead>
<tr>
         <th>Sl No</th>
         <th>Minimum Amount</th>
         <th>Delivery Charges</th>
         <th>Minimum Stock</th>
         <th>Date</th>                                                     
         <th>Edit</th>                                                     
         <th>Delete</th>                                                       
</tr>
</thead>
<tbody>
<?php
            $sql=$conn->prepare("SELECT * FROM extra_charges");
            $sql->execute();
            $result=$sql->get_result();
            $sl=1;
            while($row=$result->fetch_assoc())
            {
                ?>
                <tr>
                    <td><?php echo $sl++;?></td>                                  



                    <td><?php echo $row['ec_min_amount'];?></td>
                    <td><?php echo $row['ec_delivery_charges'];?></td>
                    <td><?php echo $row['ec_min_stock_qty'];?></td>
                    <td><?php echo $row['ec_date'];?></td>
                    <td><a class="btn btn-primary" href="extra_charges_edit.php?id=<?php echo $row['ec_id'];?>">EDIT</a></td>
                    <td><a class="btn btn-danger" href="extra_charges_delete.php?id=<?php echo $row['ec_id'];?>">DELETE</a></td>
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











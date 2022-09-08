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
<h4 class="card-title" style="float:left;">CUSTOMER ORDER PLACED DETAILS</h4>
<!--<a href="customer_form.php"><h4 class="card-title" style="float:right;"><button class="btn btn-md btn-info">NEW</button></h4></a>-->
</div>
<div class="card-content">
<div class="card-body card-dashboard">
<div class="table-responsive">
<table class="table zero-configuration">
<thead>
<tr>
<th>Sl No.</th>
<th>Name</th>
<th>Order Date</th>
<th>Amount <br>Order No. <br>Payment Mode</th>
<th>Order Status</th>
<th>ACTION</th>
</tr>
</thead>
<tbody>
<?php
$sql=$conn->prepare("SELECT * FROM customer c,customer_order_details cod WHERE c.cu_id=cod.cu_id ORDER BY cod.cod_id DESC");
$sql->execute();
$result=$sql->get_result();
$sno=1;
while($row=$result->fetch_assoc()){
$json_array = json_decode($row["order_json"],true);
//print("<pre>".print_r($json_array,true)."</pre>");
?>
<tr>
<td><?php echo $sno++;//$row['ad_id'];?> </td>
<td><?php echo $row['cu_name']?></td>
<td><?php echo $row['order_date'];?></td>
<td><b>AMT : </b><?php echo currencyFormat($json_array['amount_details']['grand_total']);?><br><br><b>ORD NO : </b><?php echo $row['order_no'];?>
<br><br>
<?php if($json_array['shipping_details']['payment_mode'] == "COD")
{    
?>
<b><?php echo $json_array['shipping_details']['payment_mode'];?></b>
<?php 
}
else
{ 
?>
<b><?php echo $json_array['shipping_details']['payment_mode'];?></b><br>
<?php echo $json_array['shipping_details']['transaction_no'];?>
<?php 
} 
?>
</td>                      
<td><?php if($row['order_status'] == 'ORDER PLACED'){
?>               
<form action="customer_order_confirm.php" method="post">
<input type="hidden" name="cu_id" value="<?php echo $row['cu_id']?>">
<input type="hidden" name="orderno" value="<?php echo $row['order_no']?>">
<input type="hidden" name="cu_name" value="<?php echo $row['cu_name']?>">
<input type="hidden" name="cu_contact" value="<?php echo $row['cu_contact']?>">
<input type="hidden" name="grand_total" value="<?php echo $json_array['amount_details']['grand_total'];?>">
<button type="submit" class="btn btn-sm btn-success" style="width:100%;">CONFIRM</button><br><br>
</form>    
    
<form action="customer_order_cancel.php" method="post">
<input type="hidden" name="cod_id" value="<?php echo $row['cod_id']?>">
<input type="hidden" name="orderno" value="<?php echo $row['order_no']?>">
<input type="hidden" name="cu_name" value="<?php echo $row['cu_name']?>">
<input type="hidden" name="cu_contact" value="<?php echo $row['cu_contact']?>">
<button type="submit" class="btn btn-sm btn-danger" style="width:100%;">CANCEL ORDER</button>
</form>         
<?php 
}
?>    
    
<?php if($row['order_status'] == 'ORDER CONFIRMED'){?> 
<form action="customer_order_tracking.php" method="post">    
<input type="hidden" name="cu_id" value="<?php echo $row['cu_id']?>">    
<input type="hidden" name="orderno" value="<?php echo $row['order_no']?>">    
<?php
    if($row["order_tracking_level"]==5){
    ?>
    <button type="submit" class="btn btn-sm btn-info" style="width:100%;">ORDER TRACKING COMPLETED</button>
    <?php    
    }    
    else{
?>
<button type="submit" class="btn btn-sm btn-success" style="width:100%;">ORDER TRACKING</button>
<?php } ?>    
</form>  
<?php } ?>

</td>                   
<td>
<form action="customer_order_details.php" method="post">
<input type="hidden" name="cu_id" value="<?php echo $row['cu_id']?>">
<input type="hidden" name="order_date" value="<?php echo $row['order_date']?>">
<input type="hidden" name="order_no" value="<?php echo $row['order_no']?>">
<button type="submit" class="btn btn-sm btn-primary" style="width:100%;">ORDER DETAILS</button> 
</form>
<br>
<form action="customer_order_invoice.php" method="post">
<input type="hidden" name="cod_id" value="<?php echo $row['cod_id']?>">
<input type="hidden" name="cu_id" value="<?php echo $row['cu_id']?>">
<input type="hidden" name="ci_date" value="<?php echo $row['date']?>">
<input type="hidden" name="ci_orderno" value="<?php echo $row['order_no']?>">
<button type="submit" class="btn btn-sm btn-info" style="width:100%;">GENERATE BILL</button>
</form>
</td>                   
</tr>
<?php } ?>

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
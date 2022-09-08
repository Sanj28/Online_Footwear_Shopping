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
<a href="customer_order_placed.php"><h4 class="card-title" style="float:right;"><button class="btn btn-md btn-info">BACK</button></h4></a>
</div>
<div class="card-content">
<div class="card-body card-dashboard">
<div class="table-responsive">
<?php
$customer_id=$_POST['cu_id'];
$order_date=$_POST['order_date'];
$order_no=$_POST['order_no'];
$sl=1;             
$sql=$conn->prepare("SELECT * FROM customer_order_details cod,customer c WHERE c.cu_id=cod.cu_id AND cod.cu_id=? AND cod.order_no=?");
$sql->bind_param("ii",$customer_id,$order_no);
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_assoc();
$json_array = json_decode($row["order_json"],true);     
//print("<pre>".print_r($json_array,true)."</pre>");                                            
?>
<table class="table table-striped table-bordered zero-configuration1">
<tr>
    <td style="font-weight:bold;font-size:17px">
        <span style="color:black;text-decoration:underline">Customer Information</span><br>
        <?php echo $row["cu_name"];?><br>
        <?php echo $row["cu_contact"];?><br>
        <?php echo $row["cu_email"];?><br>
    </td>
    <td style="font-weight:bold;font-size:17px" colspan="6">
        <span style="color:black;text-decoration:underline">Shipping Information</span><br>
        <?php echo $json_array["shipping_details"]["shipping_address"];?><br>
        <?php echo $json_array["shipping_details"]["landmark"];?><br>
        <?php echo $json_array["shipping_details"]["contact_no"];?><br>
        <?php echo $json_array["shipping_details"]["payment_mode"];?><br>
        <?php echo $json_array["shipping_details"]["transaction_no"];?><br>
    </td>
</tr> 

</table>
<table class="table table-striped table-bordered zero-configuration1">
<thead>
<tr><td colspan="9" align="center"><b>Product Order Details</b></td></tr>
<tr>
<td><b>Sl No.</b></td>
<td><b>Image</b></td>
<td><b>Product Name</b></td>
<td align="right"><b>Size</b></td>
<td align="right"><b>Quantity</b></td>
<td align="right"><b>Unit Price</b></td>                                  
<td align="right"><b>Sub Total</b></td>                                  
<td align="right"><b>Tax</b></td>                                  
<td align="right"><b>Total Amount</b></td>                                  
</tr>
</thead>
<tbody>

<?php
foreach($json_array["product_details"] as $row) 
{           
?>
<tr>                
<td>
<?php echo $sl++;?>
</td>
<td>
<img src="photo/<?php echo $row["image"]?>" width="80px" height="80px">
</td>
<td>
<?php echo $row['name'];?>
</td>
<td>
<?php echo $row['pd_size'];?>
</td>
<td align="right">
<?php echo $row['qty'];?>
</td>
<td align="right">
<?php
if($row['discount_percent']!=0)
{
?>
<strike>&#x20B9;<?php echo currencyFormat($row['price']);?></strike><br>
<span>&#x20B9;<?php echo currencyFormat($row['price']-$row['discount_percent']);?></span>
<?php    
}
else{
?>
<span>&#x20B9;<?php echo currencyFormat($row['price']);?></span>
<?php
}
?>                
</td>                                             
<td align="right">&#x20B9;<?php echo currencyFormat($row['sub_total']);?></td> 
<td align="right">
<?php echo $row['tax'];?>%<br>&#x20B9;<?php echo currencyFormat($row['tax_amount']);?>
</td><td align="right">
&#x20B9;<?php echo currencyFormat($row['totalamount']);?>
</td>


</tr>

<?php                
}
?>
<tr><td colspan="8" align="right">Sub Total</td>
<td align="right"><b>&#x20B9;<?php echo currencyFormat($json_array["amount_details"]["total"]);?></b></td></tr>
<tr><td colspan="8" align="right">Delivery Charge</td>
<td align="right"><b>&#x20B9;<?php echo currencyFormat($json_array["amount_details"]["delivery_charges"]);?></b></td></tr>
<tr><td colspan="8" align="right">Grand Total</td>
<td align="right"><b>&#x20B9;<?php echo currencyFormat($json_array["amount_details"]["grand_total"]);?></b></td></tr>
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
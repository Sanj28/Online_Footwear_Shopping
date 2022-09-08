<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
<?php include_once("1_metatags.php"); ?>
</head>

<body class="full-width">

<!--=============================
=            Header             =
==============================-->

<header>
<?php include_once("2_header.php"); ?>

<!-- breadcrumb section -->
<div class="breadcrumb-area mt-15">
<div class="container">
<div class="row">
<div class="col">
<div class="breadcrumb-container">
<ul>
<li><a href="index.php">Home</a> <span class="bc-separator">|</span></li>
<li class="active">ORDER DETAILS</li>
</ul>
</div>
</div>
</div>
</div>
</div>
<!-- end of breadcrumb section -->
</header>
<!--====  End of Header   ====-->

<!--===========================================
=            Cart content section            =
============================================-->

<div class="page-content mt-50 mb-10">
<div class="container">

<div class="row">
<div class="col-12">
<!-- Cart Table -->
<div class="cart-table table-responsive mb-40">
<table class="table">
<thead>
<tr>
<th>Sl No.</th>
<th>Name</th>
<th>Order Date</th>
<th>Order Details</th>
<th>Order Status</th>
<th>ACTION</th>
</tr>
</thead>
<tbody>
<?php
$sql=$conn->prepare("SELECT * FROM customer c,customer_order_details cod WHERE c.cu_id=cod.cu_id AND c.cu_id=? ORDER BY cod.cod_id DESC");
$sql->bind_param("i",$cu_id);    
$sql->execute();
$result=$sql->get_result();
$sno=1;
while($row=$result->fetch_assoc()){
$json_array = json_decode($row["order_json"],true);
//print("<pre>".print_r($json_array,true)."</pre>");
?>
<tr style="text-align:left">
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
<td>        
<?php if($row['order_status'] == 'ORDER CONFIRMED'){?>    
<form action="product_order_tracking.php" method="post">    
<input type="hidden" name="cu_id" value="<?php echo $row['cu_id']?>">    
<input type="hidden" name="orderno" value="<?php echo $row['order_no']?>">    
<button type="submit" class="btn btn-sm btn-success" style="width:100%;">TRACK YOUR ORDER</button>
</form>    
<?php 
}else
{
?>
<button type="submit" class="btn btn-sm btn-danger" style="width:100%;" disabled>ORDER PLACED</button> 
<?php
}
?>
</td>                   
<td>
<form action="product_order_summary_details.php" method="post">
<input type="hidden" name="cu_id" value="<?php echo $row['cu_id']?>">
<input type="hidden" name="order_date" value="<?php echo $row['order_date']?>">
<input type="hidden" name="order_no" value="<?php echo $row['order_no']?>">
<button type="submit" class="btn btn-sm btn-primary" style="width:100%;">ORDER DETAILS</button> 
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
<!--====  End of Cart content section  ====-->
<br><br><br>
<!--============================
=            footer            =
=============================-->

<?php include_once("3_footer.php"); ?>

<!--====  End of footer  ====-->


<!-- scroll to top  -->
<a href="#" class="scroll-top"></a>
<!-- end of scroll to top -->



<!-- ************************* JS ************************* -->
<?php include_once("4_footer_scripts.php"); ?>
<?php include_once("8_json_scripts.php");?>
</body>
</html>


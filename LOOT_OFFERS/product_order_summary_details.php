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
//       print("<pre>".print_r($json_array,true)."</pre>");                                            
?> 
<table class="table">
<thead>
<tr><td><a href="product_order_summary.php" class="btn btn-md btn-info">BACK</a></td><td colspan="7" align="center"><b>Product Order Details</b></td></tr>

<tr>
<td align="center"><b>Sl No.</b></td>
<td align="center"><b>Image</b></td>
<td align="center"><b>Product Name</b></td>
<td align="center"><b>Size</b></td>
<td align="center"><b>Quantity</b></td>
<td align="center"><b>Unit Price</b></td>                                  
<td align="center"><b>Tax</b></td>                                  
<td align="center"><b>Total Amount</b></td>  
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
<img src="admin/photo/<?php echo $row["image"]?>" width="80px" height="80px">
</td>
<td>
<?php echo $row['name'];?>
</td>
<td>
<?php echo $row['pd_size'];?>
</td>
<td align="center">
<?php echo $row['qty'];?>
</td>
<td align="center">
<?php
if($row['discount_percent']!=0)
{
?>
<strike>&#8377;<?php echo currencyFormat($row['price']);?></strike><br>
<span>&#8377;<?php echo currencyFormat($row['price']-$row['discount_percent']);?></span>
<?php    
}
else{
?>
<span>&#8377;<?php echo currencyFormat($row['price']);?></span>
<?php
}
?>                
</td>                                             
<td align="right">
<?php echo currencyFormat($row['tax']);?>%<br>&#x20B9;<?php echo currencyFormat($row['tax_amount']);?>
</td><td align="right">
&#x20B9;<?php echo currencyFormat($row['totalamount']);?>
</td>


</tr>

<?php                
}
?>
<tr><td colspan="7" align="right">Sub Total</td>
<td align="right"><b>&#8377;<?php echo currencyFormat($json_array["amount_details"]["total"]);?></b></td></tr>
<tr><td colspan="7" align="right">Delivery Charge</td>
<td align="right"><b>&#8377;<?php echo currencyFormat($json_array["amount_details"]["delivery_charges"]);?></b></td></tr>
<tr><td colspan="7" align="right">Grand Total</td>
<td align="right"><b>&#8377;<?php echo currencyFormat($json_array["amount_details"]["grand_total"]);?></b></td></tr>
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
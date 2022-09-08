<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
<?php include_once("1_metatags.php"); ?>
<link rel="stylesheet" href="admin/7_TRACKING_STATUS.css">  
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
<li class="active">Order Tracking Summary</li>
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
$sql=$conn->prepare("SELECT * FROM customer_order_details WHERE order_no=? AND cu_id=?");
$sql->bind_param("ss",$_POST["orderno"],$_POST["cu_id"]);
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_assoc();
$tracking_level=$row["order_tracking_level"]+1;       
$json_array = json_decode($row["order_tracking"],true);    
//print_r($json_array);    
?>
<!-- /Row -->

<ol class="progtrckr" data-progtrckr-steps="5">
    
<li class="progtrckr-todo" id="Warehouse Shipping" data-value="Warehouse Shipping">Warehouse Shipping</li>
<li class="progtrckr-todo" id="Order Dispatched" data-value="Order Dispatched">Order Dispatched</li>
<li class="progtrckr-todo" id="Order On The Way" data-value="Order On The Way">Order On The Way</li>
<li class="progtrckr-todo" id="Out For Delivery" data-value="Out For Delivery">Out For Delivery</li>
<li class="progtrckr-todo" id="Delivered" data-value="Delivered">Delivered</li>
</ol>
<br>    
<table class="table table-bordered track_tbl" id="order_tracking">
<thead>        
<th>Slno</th>
<th>Status</th>
<th>Description</th>
<th>Date</th>
</thead>
<tbody> 
    
<!-- CREATE HIDDEN FIELD TO COUNT THE NUMBER OF ORDER TRACKING ARRAY-->    
<input type="hidden" id="count" value="<?php echo count($json_array);?>">  
<!-- CREATE HIDDEN FIELD TO COUNT THE NUMBER OF ORDER TRACKING ARRAY-->    
    
<?php
if(!empty($row["order_tracking"])){
$slno=1;
$count=1;    
foreach($json_array as $row)
{  
?>    
<tr>
<td class="table-p-name"><?php echo $slno++;?></td>    
<!-- DYNAMICALLY CREATE ID FOR TD TO ACCESS THE ORDER STATUS VALUE -->    
<td class="table-p-name" id="td<?php echo $count++;?>"><?php echo $row["order_status"];?></td>
<!-- DYNAMICALLY CREATE ID FOR TD TO ACCESS THE ORDER STATUS VALUE -->        
<td class="table-p-name"><?php echo $row["order_description"];?></td>
<td class="table-p-name"><?php echo $row["order_date"];?></td>            
</tr>    
<script type="text/javascript">
    var count_value=document.getElementById("count").value;
    for(var i=1;i<=count_value;i++)
    {
        var td_id=document.getElementById("td"+i).textContent;//GET TD TEXT VALUE
        var ol_id=document.getElementById(td_id).getAttribute("data-value");//GET LIST VALUE FOR ORDER STATUS        
        if(td_id==ol_id){
        document.getElementById(ol_id).className = 'progtrckr-done'; // CHANGE ORDER STATUS DYNAMICALLY         
        }            
    }    
    
</script>        
<?php
}    
}            
?>
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



<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
<?php include_once("1_meta_tags.php"); ?>
<link rel="stylesheet" href="7_tracking_status.css"> 
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

<div class="col-md-12 col-12">
<div class="card">
<div class="card-header">
<center><h4 class="card-title">CUSTOMER ORDER TRACKING</h4></center>
</div>
<?php
$sql=$conn->prepare("SELECT * FROM customer_order_details WHERE order_no=? AND cu_id=?");
$sql->bind_param("ss",$_POST["orderno"],$_POST["cu_id"]);
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_assoc();
$tracking_level=$row["order_tracking_level"]+1;       
$json_array = json_decode($row["order_tracking"],true);    
?>
	
<!-- MENTION ID FOR JAVACRIPT TO HIDE DIV AFTER COMPLETION OF TRACKING-->   
<input type="hidden" id="tracking_level" value="<?php echo $row["order_tracking_level"];?>">        
<textarea id="jsonArray" style="display:none;"><?php echo $row["order_tracking"];?></textarea>         
<!-- MENTION ID FOR JAVACRIPT TO HIDE DIV AFTER COMPLETION OF TRACKING--> 
	
<div class="card-content">
<div class="card-body">
<form name="formID" id="formID" method="post" enctype="multipart/form-data">
<input type="hidden" name="orderno" id="orderno" value="<?php echo $_POST["orderno"]?>">
<input type="hidden" name="cu_id" id="cu_id" value="<?php echo $_POST["cu_id"]?>">
<input type="hidden" name="tracking_json" id="tracking_json">     
<div class="form-body">
 
<div class="form-group">
<label for="timesheetinput1">ORDER STATUS</label>
<select name="tracking_status" id="tracking_status" class="form-control">
<option value="">--SELECT ORDER STATUS--</option>          
<?php
if($tracking_level==1)
{ ?>
<option value="1">Warehouse Shipping</option>  
<?php }
?>
<?php
if($tracking_level==2)
{ ?>
<option value="2">Order Dispatched</option> 
<?php }
?>
<?php
if($tracking_level==3)
{ ?>
<option value="3">Order On The Way</option>
<?php }
?>
<?php
if($tracking_level==4)
{ ?>
<option value="4">Out For Delivery</option> 
<?php }
?>
<?php
if($tracking_level==5)
{ ?>
<option value="5">Delivered</option>  
<?php }
?>         
</select>
<span id="tracking_status_error"></span>
</div>
 
<div class="form-group">
<label for="timesheetinput1">ORDER DESCRIPTION</label>
<textarea name="tracking_description" id="tracking_description" class="form-control"></textarea>
<span id="tracking_description_error"></span> 
</div> 
<input type="hidden" name="tracking_date" id="tracking_date" value="<?php echo date('Y-m-d');?>"> 
</div>

<div class="form-actions center">
<button type="submit" class="btn btn-success">Save</button>
<button type="button" class="btn btn-danger" onclick="window.location.href='customer_order_placed.php'">Cancel</button>
</div>
</form>
 
<ol class="progtrckr" data-progtrckr-steps="5">    
<li class="progtrckr-todo" id="Warehouse Shipping" data-value="Warehouse Shipping">Warehouse Shipping</li>
<li class="progtrckr-todo" id="Order Dispatched" data-value="Order Dispatched">Order Dispatched</li>
<li class="progtrckr-todo" id="Order On The Way" data-value="Order On The Way">Order On The Way</li>
<li class="progtrckr-todo" id="Out For Delivery" data-value="Out For Delivery">Out For Delivery</li>
<li class="progtrckr-todo" id="Delivered" data-value="Delivered">Delivered</li>
</ol>

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
<?php
}
?>
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
?>
</tbody>
</table>
	
</div>
</div>
</div>
</div>

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
$(document).ready(function(){   
localStorage.removeItem('order_tracking');    
//TO HIDE DIV AFTER COMPLETION OF TRACKING    
if(document.getElementById('tracking_level').value==5)
{
$('#trackingDiv').hide();
}
var jsonData=document.getElementById("jsonArray").value;
//INITIALIZE & CHECK LOCALSTORAGE     
if (localStorage.getItem('order_tracking') == null && jsonData==""){
var order_tracking={};  
}
else
{
var jsonArray=JSON.parse(document.getElementById("jsonArray").value);       
localStorage.setItem('order_tracking', JSON.stringify(jsonArray));            
order_tracking = JSON.parse(localStorage.getItem('order_tracking'));                
//for(var items in order_tracking)
//{
//console.log(order_tracking);
//console.log(order_tracking[items]["order_description"]);    
//}
}        

var tracking_status = '';                        
var tracking_description = '';  

$(document).on('submit', '#formID', function(event) 
{
event.preventDefault();   

tracking_description = fieldrequired('tracking_description', 'tracking_description_error', 'Description');   
  
tracking_status = fieldrequired('tracking_status', 'tracking_status_error', 'Status');        
if (tracking_description == 1 && tracking_status == 1) 
{

var selected_value=$('select option:selected').text();
var order_description=document.getElementById('tracking_description').value;
var cu_id=document.getElementById('cu_id').value;
var order_date=document.getElementById('tracking_date').value;


if (order_tracking[selected_value]!= undefined)
{
alert("Status Already Updated");
}
else
{                    
order_tracking[selected_value]={order_status:selected_value,order_description:order_description,order_date:order_date};     
localStorage.setItem('order_tracking', JSON.stringify(order_tracking));
console.log(order_tracking);
$('#tracking_json').val(JSON.stringify(order_tracking));                  
    
var formData = new FormData($('#formID')[0]);  
$.ajax({
url: "customer_order_tracking_update.php",
method: 'POST',
data: formData,
contentType: false,
processData: false,
dataType: "json",
success: function(data)
{
alert(data.status);
localStorage.removeItem('order_tracking');    
//if(data.tracking_status==5)
//{        
//if (localStorage.getItem('order_tracking') == null) {
//var order_tracking = {};
//}
//else {		
//order_tracking = JSON.parse(localStorage.getItem('order_tracking'));
//localStorage.clear();
//order_tracking = {};
//}       
//}    
location.reload();
}
})  
}
}
});
});
</script>   

</body>
<!-- END: Body-->

</html>

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
<li class="active">CHECKOUT</li>
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
=            checkout content section            =
============================================-->
<div class="page-content mt-50 mb-10">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="page-title">
<h2>Checkout</h2>
</div>
</div>
</div>
<div class="row">
<div class="col-12">
<!-- Checkout Form s-->
<form class="checkout-form" method="post" onsubmit="return ValidateForm()" action="product_order_confirmation.php">
<!-- //FOR JSON DATA -->
<input type="hidden" name="itemsJson" id="itemsJson">
<input type="hidden" name="buyNow_itemsJson" id="buyNow_itemsJson">
<input type="hidden" name="cu_id" id="cu_id" value="<?php echo $cu_id;?>">
<input type="hidden" name="order_no" id="order_no" value="<?php echo $order_no;?>">
<input type="hidden" name="order_date" id="order_date" value="<?php echo date('Y-m-d');?>"> 
<div class="row row-40">

<div class="col-lg-7 mb-20">

<!-- Billing Address -->
<div id="billing-form" class="mb-40">
<h4 class="checkout-title">Billing Address</h4>

<div class="row">

<div class="col-12 mb-20">
<label>Fullname</label>
<input type="text" placeholder="" value="<?php echo $fullname;?>" readonly class="custom_disable">
</div>
 
<div class="col-12 mb-20">
<label>Select Payment Mode</label>
<select class="form-control" id="payment_mode" name="payment_mode">
<option value="">--SELECT PAYMENT MODE--</option>
<option value="COD">COD</option>
<option value="PHONEPE">PHONEPE</option>  
</select>
<span id="payment_mode_error"></span>
</div>

<div class="col-12 mb-20">
<label>Address</label>
<input type="text" placeholder="Shipping Address" name="ci_shipping_address" id="ci_shipping_address">
<span id="ci_shipping_address_error"></span> 
</div>

<div class="col-md-6 col-12 mb-20">
<label>Landmark</label>
<input type="text" placeholder="Landmark" name="ci_landmark" id="ci_landmark">
<span id="ci_landmark_error"></span>
</div>
 
<div class="col-md-6 col-12 mb-20">
<label>Contact Number</label>
<input type="text" placeholder="Contact" name="ci_contact_no" id="ci_contact_no">
<span id="ci_contact_no_error"></span>
</div> 

<div class="col-12 mb-20" id="showTRANID">
<label>Transaction Number</label>
<input type="text" name="transaction_no" id="transaction_no" aria-describedby="last" placeholder="Transaction Number">
<span id="transaction_no_error"></span>
</div>
 
<div class="col-12 mb-20">
<button class="btn btn-success btn-block" type="submit" name="submit">PLACE ORDER</button> 
</div>


</div>

</div>



</div>

<div class="col-lg-5">
<div class="row">

<!-- Cart Total -->
<div class="col-12 mb-60">
<center><h4 class="checkout-title">PAYMENT MODE</h4></center>
<div class="">
<div class="payment-method myDiv" id="showCOD">
<div class="payment_list">
<img src="assets/cod.jpg" width="100%">  
</div>
</div>
<div class="payment-method myDiv" id="showPHONEPE">
<div class="payment_list">
<img src="assets/phonepe.jpg">   
</div>
</div>
</div>
</div>

</div>
</div>

</div>
</form>

</div>
</div>
</div>
</div>

<!--====  End of checkout content section  ====-->



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
<script>
$(document).ready(function()
{

$("div.myDiv").hide();
$("#showTRANID").hide();
$("#showCOD").show();   
$('#payment_mode').on('change', function(){
var value = $(this).val();                     

if(value=="PHONEPE"){

$("#showPHONEPE").show();   
$("#showTRANID").show();
$("#showCOD").hide();   
}
if(value=="COD"){

$("#showPHONEPE").hide();   
$("#showCOD").show();   
$("#showTRANID").hide();
}

});
});


function ValidateForm()
{
var payment_mode = '';
var ci_shipping_address = '';
var ci_landmark = '';                
var transaction_no='';
var ci_contact_no='';
var payment=document.getElementById('payment_mode').value;
if(payment=="COD"){
transaction_no ="1";    
}
if(payment=="PHONEPE"){
transaction_no = phonepe('transaction_no', 'transaction_no_error', 'Transaction No');    
}
payment_mode = alphabets('payment_mode', 'payment_mode_error', 'Payment Mode');
ci_shipping_address = fieldrequired('ci_shipping_address', 'ci_shipping_address_error', 'Address');
ci_landmark = fieldrequired('ci_landmark', 'ci_landmark_error', 'Landmark');                
ci_contact_no=phoneno('ci_contact_no', 'ci_contact_no_error', 'Contact');                

if(payment_mode == 1 && ci_shipping_address == 1 && ci_landmark == 1 && transaction_no == 1 && ci_contact_no == 1) 
{
var cu_id=document.getElementById("cu_id").value;
var shipping_address=document.getElementById("ci_shipping_address").value;
var landmark=document.getElementById("ci_landmark").value;
var contact_no=document.getElementById("ci_contact_no").value;
var payment_mode=document.getElementById("payment_mode").value;
var transaction_no=0;
if(payment_mode=="COD")
{
    transaction_no=0;
}
else
{
    transaction_no=document.getElementById("transaction_no").value;
}


if (localStorage.getItem('cart_lt') == null) {
    var cart_lt = {};
} 
else {
    cart_lt = JSON.parse(localStorage.getItem('cart_lt'));

    cart_lt["shipping_details"] = {"shipping_address":shipping_address,"landmark":landmark,"contact_no":contact_no,"payment_mode":payment_mode,"transaction_no":transaction_no};
    cart_lt["customer_id"]={"customer_id":cu_id,};
    localStorage.setItem('cart_lt', JSON.stringify(cart_lt));
    $('#itemsJson').val(JSON.stringify(cart_lt));
    return true;
    }
        
if (localStorage.getItem('buynow_lt') == null) {
    var buynow_lt = {};
} 
else {
    buynow_lt = JSON.parse(localStorage.getItem('buynow_lt'));

    buynow_lt["shipping_details"] = {"shipping_address":shipping_address,"landmark":landmark,"contact_no":contact_no,"payment_mode":payment_mode,"transaction_no":transaction_no};
    buynow_lt["customer_id"]={"customer_id":cu_id,};
    localStorage.setItem('buynow_lt', JSON.stringify(buynow_lt));
    $('#buyNow_itemsJson').val(JSON.stringify(buynow_lt));
    return true;
    }    
}
else
{
return false;
}
}
</script> 
</body>
</html>
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
<li class="active">CART</li>
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
<div class="col-lg-12">
<div class="page-title">
<h2>Cart</h2>
</div>
</div>
</div>
<div class="row">
<div class="col-12">
<h1 id="items"></h1><!--TO SHOW EMPTY CART MESSAGE-->
<!-- Cart Table -->
<div class="cart-table table-responsive mb-40" id="hideDiv"><!--TO HIDE DIV FOR EMPTY CART-->  
<table class="table">
<thead>
<tr>
<th class="pro-title">#</th>
<th class="pro-thumbnail">IMAGE</th>
<th class="pro-title">NAME</th>
<th class="pro-price">UNIT PRICE</th>
<th class="pro-quantity">QTY</th>
<th class="pro-subtotal">SUB TOTAL</th>
<th class="pro-subtotal">TAX</th>
<th class="pro-subtotal">TOTAL PRICE</th>
<th class="pro-remove">DELETE</th>
</tr>
</thead>
<tbody id="table_id">
<!-- DYNAMICALLY LOADS FROM JAVASCRIPT -->
</tbody>
</table>
<?php
if(isset($_SESSION['customer']))
{
?>
<a href="7_checkout_validate.php" class="btn btn-primary btn-block checkout_items">PROCEED TO CHECKOUT</a>
<?php 
} 
else
{
?>
<div align="center">
<form method="post" action="customer_login_register.php">
<?php 
include_once('5_current_page_url.php');
?>
<input type="hidden" name="product_details_url" id="product_details_url" value="<?php echo $current_link;?>">
<input type="submit" class="btn btn-sm btn-success btn-rounded btn-block" value="Login/Register to Order Products">
</form>
</div>  
<?php } ?> 
</div>

</div>
</div>
</div>
</div>
<!--====  End of Cart content section  ====-->
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
localStorage.removeItem('cart_lt'); 
if (localStorage.getItem('buynow_lt') == null) {
    var buynow_lt = {};
    var mystr = `<p>Your cart is empty, please add some items to your cart before checking out!</p>`
    $('#items').append(mystr);    
    $('#hideDiv').hide();
    localStorage.clear();
} 
else {    
buynow_lt = JSON.parse(localStorage.getItem('buynow_lt'));        
var product_keys=buynow_lt["product_details"];            
var amount_details=buynow_lt["amount_details"];            
if ($.isEmptyObject(product_keys))
{    
    var mystr = `<p>Your cart is empty, please add some items to your cart before checking out!</p>`
    $('#items').append(mystr);    
    $('#hideDiv').hide();
    localStorage.clear();
}    
var sum = 0;
var slno = 0;
var totalPrice = 0;

     for (var items in product_keys) {                   
        var psd_id = product_keys[items]["psd_id"];
        var pd_id = product_keys[items]["id"];
        var pd_name =product_keys[items]["name"];
        var pd_qty = product_keys[items]["qty"];
        var pd_image =product_keys[items]["image"];
        var pd_price =product_keys[items]["price"];
        var pd_discount =product_keys[items]["discount_percent"];
        var pd_sub_total =product_keys[items]["sub_total"];
        var pd_total_amount =product_keys[items]["totalamount"];
        var pd_tax =product_keys[items]["tax"];
        var pd_tax_amount =product_keys[items]["tax_amount"];
        var max_qty_allowed =product_keys[items]["max_qty_allowed"];

        var total_price=pd_price-pd_discount;
        totalPrice = totalPrice+pd_total_amount;

        slno=slno+1;
        var keys = Object.keys(buynow_lt["product_details"]);          
        totalPrice = totalPrice + pd_qty* total_price;
        mystr='<tr>';
        mystr+='<td class="table-p-name">'+slno+'</td>';
        mystr+='<td class="table-p-name"><img src="admin/photo/'+pd_image+'" alt="" style="width:100px; height:100px"></td>'; 
        mystr+='<td class="table-p-name">'+pd_name+'</td>';
        if(pd_discount!=0)
        {
          
        mystr+='<td class="table-p-name" align="center">';
        mystr+='<strike><span class="new-price">&#8377;'+formatIntAmount(pd_price)+'</span></strike><br>';
        mystr+='<h4>&#8377;'+formatIntAmount(total_price)+'</h4>';
        mystr+='</td>';
        }
        else
        {
            mystr+='<td class="table-p-name"><h4>&#8377;'+formatIntAmount(total_price)+'</h4></td>';
        }
        
        mystr+='<td class="table-p-name">'+pd_qty+'</td>';   
        mystr+='<td><h4>&#8377;'+formatIntAmount(pd_sub_total)+'</h4></td>';
        mystr+='<td><h4>'+pd_tax+'%<br>&#8377;'+formatIntAmount(pd_tax_amount)+'</h4></td>';
        mystr+='<td><h4>&#8377;'+formatIntAmount(pd_total_amount)+'</h4></td>';
        mystr+='<td class="table-p-name"><button class="btn btn-danger delete" id="'+psd_id+'"><i class="fa fa-trash-o"></i></button></td>';
        mystr+='</tr>';  
        $('#table_id').append(mystr);
    }
        mystr_cart="";
        mystr_cart+='<tr>';
        mystr_cart+='<td class="table-p-name" colspan="7"><span style="float:right">Total Amount(&#8377;)</span></td>'; 
        mystr_cart+='<td class="table-p-name" colspan="2"><h4>&#8377;'+formatIntAmount(amount_details["total"])+'</h4></td>';         
        mystr_cart+='</tr>';         
        mystr_cart+='<tr>';
        mystr_cart+='<td class="table-p-name" colspan="7"><span style="float:right">Delivery Charges(&#8377;)</span></td>'; 
        mystr_cart+='<td class="table-p-name" colspan="2"><h4>&#8377;'+formatIntAmount(amount_details["delivery_charges"])+'</h4></td>';  
        mystr_cart+='</tr>'; 
        mystr_cart+='<tr>';
        mystr_cart+='<td class="table-p-name" colspan="7"><span style="float:right">Grand Total(&#8377;)</span></td>'; 
        mystr_cart+='<td class="table-p-name" colspan="2"><h4>&#8377;'+formatIntAmount(amount_details["grand_total"])+'</h4></td>';  
        mystr_cart+='</tr>';
    $('#table_id').append(mystr_cart);
    

    $('.delete').on('click', function(){

        var deleteId=$(this).attr('id');                   
        var keys = Object.keys(buynow_lt["product_details"]);
        var product_keys=buynow_lt["product_details"];        
       
        for(var i=0;i<keys.length;i++)
        {  
            if(keys[i]==deleteId)
            {
                var record=keys[i];
                delete buynow_lt["product_details"][record];   
                localStorage.setItem('buynow_lt', JSON.stringify(buynow_lt));                
            }
        }
       location.reload();        
       
    });
}
</script>
</body>
</html>


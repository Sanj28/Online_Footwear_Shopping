<?php require("9_extra_charges.php");?>
<script>
	 
$(document).ready(function () {
	$("#stock_status_out").hide();

	//PRODUCT SIZE AJAX CALL START
	$('#ps_id').on('change', function() {
		var ps_id = $(this).val();
		var pc_id = $('#pc_id').val();
		var pt_id = $('#pt_id').val();
		var pd_id = $('#pd_id').val();
		if (ps_id) {
			$.ajax({
				type: 'POST',
				url: '9_product_size_ajax.php',
				data: {ps_id: ps_id,pc_id:pc_id,pt_id:pt_id,pd_id:pd_id},
				dataType: "json",
				success: function(html) {
		$('#qty'+html.pd_id).attr({ "max":html.max_qty_allowed});
		$('#pd_price'+html.pd_id).val( html.pd_price);
		$('#pd_discount'+html.pd_id).val( html.pd_discount);
		$('#max_qty_allowed'+html.pd_id).val( html.max_qty_allowed);
		$('#pd_size'+html.pd_id).val( html.pd_size);
		$('#product__price'+html.pd_id).html( html.pd_price_new);
		if(html.stock_status=="IN STOCK")
		{	
			$("#stock_status_out").hide();
			$("#stock_status_in").show();
			$("#stock_status_inqty").show();
		}
		else
		{
			$("#stock_status_out").show();
			$("#stock_status_in").hide();
			$("#stock_status_inqty").hide();
		}
		
				}
			});
		} 
	});
	//PRODUCT SIZE AJAX CALL END
} );
	
</script>
<script type="text/javascript">
// Find out the cart_lt items from localStorage
localStorage.removeItem("buynow_lt");    
if (localStorage.getItem('cart_lt') == null) {
    var cart_lt = {};
    var items = { product_details: {} };// initially empty
    cart_lt=items;
}
else{
    cart_lt = JSON.parse(localStorage.getItem('cart_lt'));
    updateCart(cart_lt);
}
	
	//PRODUCT CART START
    $('.cart').on('click',function(){
		
	var pd_id = this.id.toString();   
	var pd_size = document.getElementById("pd_size"+pd_id).value.toString();
	var psd_id=pd_size+" PD"+pd_id;
	var ps_id='';
	var rental_start_date='';
	ps_id=fieldrequired('ps_id','ps_id_error','SIZE');
		if(ps_id==1 )
			{ 
    if (cart_lt["product_details"][psd_id] != undefined)
    {
        alert("Record Exists in Cart");
       
    } else {
		
		var pc_id = document.getElementById("pc_id").value;                
		var pt_id = document.getElementById("pt_id").value;                
		var ps_id = document.getElementById("ps_id").value;
		var pc_tax = document.getElementById("pc_tax"+pd_id).value;
		var qty = document.getElementById("qty"+pd_id).value;                
		var name=document.getElementById("pd_name"+pd_id).value;        
		var price=document.getElementById("pd_price"+pd_id).value;
		var discount=document.getElementById("pd_discount"+pd_id).value;
		var max_qty_allowed=document.getElementById("max_qty_allowed"+pd_id).value;     
		var total_price=Math.round(parseFloat(price-discount).toFixed(2));
		var image=document.getElementById("pd_image"+pd_id).value;                     
		var sub_total=Math.round(parseFloat(qty*total_price).toFixed(2));
		var tax_amount=Math.round(parseFloat((sub_total*pc_tax/100)).toFixed(2));
		var total_amount=Math.round(parseFloat(parseFloat(sub_total)+parseFloat(sub_total*pc_tax/100)).toFixed(2)); 
                      
        cart_lt["product_details"][psd_id]=
		{
			"psd_id":psd_id,
			"id":parseInt(pd_id),
			"pc_id":parseInt(pc_id),
			"pt_id":parseInt(pt_id),
			"ps_id":parseInt(ps_id),
			"pd_size":pd_size,
			"name":name,
			"image":image,
			"qty":qty,
			"price":parseFloat(price),
			"discount_percent":parseFloat(discount),
			"sub_total":parseFloat(sub_total),
			"tax":parseFloat(pc_tax),
			"tax_amount":parseFloat(tax_amount),
			"totalamount":parseFloat(total_amount),
			"max_qty_allowed":max_qty_allowed
		};
        alert("Record Addeddd to Cart");
    }
        updateCart(cart_lt);
			}
});
//PRODUCT CART END

function updateCart(cart_lt) {
    var productkeys = Object.keys(cart_lt["product_details"]);  
    localStorage.setItem('cart_lt', JSON.stringify(cart_lt));
	var totalkeys=productkeys.length;
    document.getElementById('cart_lt_icon').innerHTML = totalkeys; // For Cart Count    
}   
</script>




<script type="text/javascript">
if (localStorage.getItem('buynow_lt') == null) {
    var buynow_lt = {};    
    var items = { product_details: {} };// initially empty
    buynow_lt=items;

} 
else{
    buynow_lt = JSON.parse(localStorage.getItem('buynow_lt'));       
}
    var totalPrice = 0;
    $('.buyNow').on('click',function(){
var pd_id = this.id.toString();   
var pd_size = document.getElementById("pd_size"+pd_id).value.toString();
	var psd_id=pd_size+" PD"+pd_id;
	var ps_id='';
	ps_id=fieldrequired('ps_id','ps_id_error','SIZE');
		if(ps_id==1 )
			{ 
    if (buynow_lt["product_details"][psd_id] != undefined)
    {
    alert("Record Exists in Cart");
    }        
    else
    {      
        var pc_id = document.getElementById("pc_id").value;                
		var pt_id = document.getElementById("pt_id").value;                
		var ps_id = document.getElementById("ps_id").value;
		var pc_tax = document.getElementById("pc_tax"+pd_id).value;
		var qty = document.getElementById("qty"+pd_id).value;                
		var name=document.getElementById("pd_name"+pd_id).value;        
		var price=document.getElementById("pd_price"+pd_id).value;
		var discount=document.getElementById("pd_discount"+pd_id).value;
		var max_qty_allowed=document.getElementById("max_qty_allowed"+pd_id).value;     
		var total_price=Math.round(parseFloat(price-discount).toFixed(2));
		var image=document.getElementById("pd_image"+pd_id).value;                     
		var sub_total=Math.round(parseFloat(qty*total_price).toFixed(2));
		var tax_amount=Math.round(parseFloat((sub_total*pc_tax/100)).toFixed(2));
		var total_amount=Math.round(parseFloat(parseFloat(sub_total)+parseFloat(sub_total*pc_tax/100)).toFixed(2)); 
                      
        buynow_lt["product_details"][psd_id]=
		{
			"psd_id":psd_id,
			"id":parseInt(pd_id),
			"pc_id":parseInt(pc_id),
			"pt_id":parseInt(pt_id),
			"ps_id":parseInt(ps_id),
			"pd_size":pd_size,
			"name":name,
			"image":image,
			"qty":qty,
			"price":parseFloat(price),
			"discount_percent":parseFloat(discount),
			"sub_total":parseFloat(sub_total),
			"tax":parseFloat(pc_tax),
			"tax_amount":parseFloat(tax_amount),
			"totalamount":parseFloat(total_amount),
			"max_qty_allowed":max_qty_allowed
		};
        localStorage.setItem('buynow_lt', JSON.stringify(buynow_lt));        

//ADD AFTER        
        var product_keys=buynow_lt["product_details"];        
        for (var items in product_keys) {           
        var pd_id = product_keys[items]["id"];
        var pd_name =product_keys[items]["name"];
        var pd_qty = product_keys[items]["qty"];
        var pd_image =product_keys[items]["image"];
        var pd_price =product_keys[items]["price"];
        var pd_discount =product_keys[items]["discount_percent"];
        var pd_total_amount =product_keys[items]["totalamount"];
        var total_price=pd_price-pd_discount;

        var keys = Object.keys(buynow_lt["product_details"]);          
        totalPrice = totalPrice + pd_total_amount;
        }
//FOR AMOUNT DETAILS
var delivery_charges_applied=0;  
var dcharges=document.getElementById('ec_delivery_charges').value;
var min_amount=document.getElementById('ec_min_amount').value;
     
if(totalPrice<parseInt(min_amount))
{
    delivery_charges_applied=dcharges;
    var total_amount=totalPrice+parseInt(delivery_charges_applied);        
}
else
{
    delivery_charges_applied=0;
    var total_amount=totalPrice;        
}
buynow_lt["amount_details"] = {"total":totalPrice,"delivery_charges":delivery_charges_applied,"grand_total":total_amount};
localStorage.setItem('buynow_lt', JSON.stringify(buynow_lt));
window.location.href = "products_shopping_cart_buynow.php"; 
}
}
});
</script>
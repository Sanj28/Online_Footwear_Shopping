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
<li><a href="index.html">Home</a> <span class="bc-separator">|</span></li>
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
<form action="#">
<!-- Cart Table -->
<div class="cart-table table-responsive mb-40">
<table class="table">
<thead>
<tr>
<th class="pro-thumbnail">Image</th>
<th class="pro-title">Product</th>
<th class="pro-price">Price</th>
<th class="pro-quantity">Quantity</th>
<th class="pro-subtotal">Total</th>
<th class="pro-remove">Remove</th>
</tr>
</thead>
<tbody>
<tr>
<td class="pro-thumbnail"><a href="single-product-variable-wide.html"><img
class="img-fluid" src="assets/images/products/1.jpg" alt="Product"></a></td>
<td class="pro-title"><a href="single-product-variable-wide.html">Zeon Zen 4
Pro</a></td>
<td class="pro-price"><span>$295.00</span></td>
<td class="pro-quantity">
<span class="pro-qty-cart counter"><input type="text" value="1" class="mr-5"></span>
</td>
<td class="pro-subtotal"><span>$295.00</span></td>
<td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
</tr>
<tr>
<td class="pro-thumbnail"><a href="single-product-variable-wide.html"><img
class="img-fluid" src="assets/images/products/2.jpg" alt="Product"></a></td>
<td class="pro-title"><a href="single-product-variable-wide.html">Aquet Drone D
420</a></td>
<td class="pro-price"><span>$275.00</span></td>
<td class="pro-quantity">
<span class="pro-qty-cart counter"><input type="text" value="1" class="mr-5"></span>
</td>
<td class="pro-subtotal"><span>$550.00</span></td>
<td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
</tr>
<tr>
<td class="pro-thumbnail"><a href="single-product-variable-wide.html"><img
class="img-fluid" src="assets/images/products/3.jpg" alt="Product"></a></td>
<td class="pro-title"><a href="single-product-variable-wide.html">Game Station
X 22</a></td>
<td class="pro-price"><span>$295.00</span></td>
<td class="pro-quantity">
<span class="pro-qty-cart counter"><input type="text" value="1" class="mr-5"></span>
</td>
<td class="pro-subtotal"><span>$295.00</span></td>
<td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
</tr>
<tr>
<td class="pro-thumbnail"><a href="single-product-variable-wide.html"><img
class="img-fluid" src="assets/images/products/4.jpg" alt="Product"></a></td>
<td class="pro-title"><a href="single-product-variable-wide.html">Roxxe
Headphone Z 75 </a></td>
<td class="pro-price"><span>$110.00</span></td>
<td class="pro-quantity">
<span class="pro-qty-cart counter"><input type="text" value="1" class="mr-5"></span>
</td>
<td class="pro-subtotal"><span>$110.00</span></td>
<td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
</tr>
</tbody>
</table>
</div>

</form>

<div class="row">

<div class="col-lg-6 col-12 mb-15">
<!-- Calculate Shipping -->
<div class="calculate-shipping">
<h4>Calculate Shipping</h4>
<form action="#">
<div class="row">
<div class="col-md-6 col-12 mb-25">
<select class="nice-select">
<option>Bangladesh</option>
<option>China</option>
<option>country</option>
<option>India</option>
<option>Japan</option>
</select>
</div>
<div class="col-md-6 col-12 mb-25">
<select class="nice-select">
<option>Dhaka</option>
<option>Barisal</option>
<option>Khulna</option>
<option>Comilla</option>
<option>Chittagong</option>
</select>
</div>
<div class="col-md-6 col-12 mb-25">
<input type="text" placeholder="Postcode / Zip">
</div>
<div class="col-md-6 col-12 mb-25">
<input type="submit" value="Estimate">
</div>
</div>
</form>
</div>
<!-- Discount Coupon -->
<div class="discount-coupon">
<h4>Discount Coupon Code</h4>
<form action="#">
<div class="row">
<div class="col-md-6 col-12 mb-25">
<input type="text" placeholder="Coupon Code">
</div>
<div class="col-md-6 col-12 mb-25">
<input type="submit" value="Apply Code">
</div>
</div>
</form>
</div>
</div>

<!-- Cart Summary -->
<div class="col-lg-6 col-12 mb-40 d-flex">
<div class="cart-summary">
<div class="cart-summary-wrap">
<h4>Cart Summary</h4>
<p>Sub Total <span>$1250.00</span></p>
<p>Shipping Cost <span>$00.00</span></p>
<h2>Grand Total <span>$1250.00</span></h2>
</div>
<div class="cart-summary-button">
<button class="checkout-btn">Checkout</button>
<button class="update-btn">Update Cart</button>
</div>
</div>
</div>

</div>

</div>
</div>
</div>
</div>
<!--====  End of Cart content section  ====-->


<!--=======================================
=            brand logo slider            =
========================================-->

<div class="brand-logo-slider mb-50">
<div class="container">
<div class="row">
<div class="col-lg-12 col-sm-12">
<div class="brand-logo-list">
<!-- ======  single brand logo block  ====== -->

<div class="single-brand-logo">
<a href="#">
<img src="assets/images/brand-logos/1.jpg" alt="">
</a>
</div>

<!-- ====  End of single brand logo block  ==== -->
<!-- ======  single brand logo block  ====== -->

<div class="single-brand-logo">
<a href="#">
<img src="assets/images/brand-logos/2.jpg" alt="">
</a>
</div>

<!-- ====  End of single brand logo block  ==== -->
<!-- ======  single brand logo block  ====== -->

<div class="single-brand-logo">
<a href="#">
<img src="assets/images/brand-logos/3.jpg" alt="">
</a>
</div>

<!-- ====  End of single brand logo block  ==== -->
<!-- ======  single brand logo block  ====== -->

<div class="single-brand-logo">
<a href="#">
<img src="assets/images/brand-logos/4.jpg" alt="">
</a>
</div>

<!-- ====  End of single brand logo block  ==== -->
<!-- ======  single brand logo block  ====== -->

<div class="single-brand-logo">
<a href="#">
<img src="assets/images/brand-logos/5.jpg" alt="">
</a>
</div>

<!-- ====  End of single brand logo block  ==== -->
<!-- ======  single brand logo block  ====== -->

<div class="single-brand-logo">
<a href="#">
<img src="assets/images/brand-logos/6.jpg" alt="">
</a>
</div>

<!-- ====  End of single brand logo block  ==== -->
<!-- ======  single brand logo block  ====== -->

<div class="single-brand-logo">
<a href="#">
<img src="assets/images/brand-logos/7.jpg" alt="">
</a>
</div>

<!-- ====  End of single brand logo block  ==== -->

</div>
</div>
</div>
</div>
</div>

<!--====  End of brand logo slider  ====-->





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

</body>
</html>
<!-- header top nav -->
<div class="header-top-nav">
<div class="container">
<div class="row">
<div class="col-lg-3 offset-lg-3 col-md-6 col-sm-12">
<!-- language and currency changer -->
<div class="language-currency-changer d-flex justify-content-center justify-content-md-start justify-content-lg-center">
<div class="language-changer">
<p class="call-us-text">Call us 24/7: (+91) 9482452100</p>
<!--
<img src="assets/images/flags/1.jpg" alt="">
<a href="#" id="changeLanguage"><span id="languageName">English <i class="fa fa-caret-down"></i></span></a>
<div class="language-currency-list hidden" id="languageList">
<ul>
<li><a href="#"><img src="assets/images/flags/1.jpg" alt=""> English</a></li>
<li><a href="#"><img src="assets/images/flags/2.jpg" alt=""> Français</a></li>
</ul>
</div>
-->
</div>
<!--
<div class="currency-changer">
<a href="#" id="changeCurrency"><span id="currencyName">USD <i class="fa fa-caret-down"></i></span></a>
<div class="language-currency-list hidden" id="currencyList">
<ul>
<li><a href="#">USD</a></li>
<li><a href="#">EURO</a></li>
</ul>
</div>
</div>
-->
</div>
<!-- end of language and currency changer -->
</div>


<div class="col-md-6 col-sm-12">
<!-- user information menu -->
<div class="user-information-menu">
<ul>
<?php  
if($customer_session==TRUE)
{
?>
<li><a href="product_order_summary.php">ORDER SUMMERY</a> <span class="separator">|</span></li>
<li><a href="customer_change_profile.php">PROFILE</a> <span class="separator">|</span></li>
<li><a href="customer_logout.php">LOGOUT</a></li>
<?php
}
else{
?>
<li><span class="separator">|</span><a href="customer_login_register.php">Login & Regiser</a></li>
<?php
} 
?>
</ul>
</div>
<!-- end of user information menu -->
</div>

</div>
</div>
</div>
<!-- end of header top nav -->

<!-- header content -->
<div class="header-content">
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-4 offset-lg-0 text-md-left text-sm-center">
<!-- logo -->
<div class="logo">
<a href="index.php"><br>
<img src="assets/images/logo.png" class="img-fluid" alt="logo">
<!--
<h4 style="font-family: Verdana, Arial, Helvetica, sans-serif;color:#395562;text-align:center;">
<span style="font-size:40px;color:#F36B6C;">LOOT</span><span style="font-size:40px;color:#395562;">&nbsp;OFFERS</span> 
</h4>
-->
</a>
</div>
<!-- end of logo -->
</div>
<div class="col-lg-6 col-md-8">
<!-- header search bar -->
<div class="header-search-bar">
<form name="f1" method="get" action="products_description.php">
<?php include('7_product_ajax_search_css.php');?>

<table>
<tr>
<td><input type="text" required name="typeahead" class="typeahead" autocomplete="off" spellcheck="false" placeholder="Search Products" size="60"></td>
<td><button type="submit"><i class="fa fa-search"></i></button></td>
</tr>
</table>	

</form>
</div>
<!-- end of header search bar -->
</div>
<div class="col-lg-3 col-md-4">
<!-- shopping cart -->
<div class="shopping-cart float-lg-right d-flex justify-content-start" id="shopping-cart">
<div class="cart-icon">
<a href="products_shopping_cart.php"><img src="assets/images/icon-topcart.png" class="img-fluid" alt=""></a>
</div>
<div class="cart-content">
<h2><a href="products_shopping_cart.php">Shopping Cart <span><span id="cart_lt_icon">(Empty)</span></span></a></h2>
</div>


<!-- end of shopping cart -->
</div>
</div>
</div>
</div>
</div>
<!-- end of header content -->
<!-- header navigation menu -->
<nav class="header-navigation black-bg">
<div class="container-fluid px-0">
<div class="navigation-container mb-0">
<div class="row">

<div class="col-lg-12 col-md-12">

<!-- Header navigation right side-->

<!-- main menu start -->
<div class="main-menu">
<nav>
<ul>
<li><a href="index.php">Home</a></li>
<?php 
$sql1=$conn->prepare("SELECT * FROM product_category ORDER BY pc_id ASC");
$sql1->execute();
$result1=$sql1->get_result();
while($row1=$result1->fetch_assoc()){
?>
<li class="menu-item-has-children"><a href="#"><?php echo $row1["pc_name"];?></a>
<ul class="sub-menu">
<?php
$sql11=$conn->prepare("SELECT * FROM product_type WHERE pc_id=? ORDER BY pt_id ASC");
$sql11->bind_param("i",$row1["pc_id"]);
$sql11->execute();
$result11=$sql11->get_result();
while($row11=$result11->fetch_assoc()){
?>
<li><a href="products.php?pc_id=<?php echo $row1['pc_id'];?>&pt_id=<?php echo $row11['pt_id'];?>"><?php echo $row11["pt_name"];?></a></li>
<?php } ?>
</ul>
</li>
<?php } ?>
<!--<li><a href="contact.html">Contact</a></li>-->
</ul>
</nav>

<!-- Mobile Menu -->
<div class="mobile-menu order-12 d-block col d-lg-none"></div>

</div>

<!-- end of Header navigation right side-->
</div>
</div>
</div>
</div>
</nav>
<!-- end of header navigation menu -->

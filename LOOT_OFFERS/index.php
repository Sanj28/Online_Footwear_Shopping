<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
<?php include_once("1_metatags.php"); ?>
<style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 600px;
  position: static;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>
</head>

<body class="full-width">

<!--=============================
=            Header             =
==============================-->

<header>
<?php include_once("2_header.php"); ?>
</header>
<!--====  End of Header   ====-->

<!--===========================================
=            homepage content section            =
============================================-->


<!-- Slider area -->
<section class="hero-slider-container">
<!-- Hero Slider Start -->
<div class="hero-slider hero-slider-one mb-20">
<!-- Hero Item Start -->
<div class="hero-item hero-bg-3">
<div class="row align-items-center justify-content-between">

<!-- Hero Content -->
<div class="hero-content col-md-6 offset-md-6 col-sm-12 offset-sm-0">
<h1>THE WINTER</h1>
<h2><span>SPORT WINTER</span></h2>
<p>This is Photoshops version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
Aenean
sollicitudin, lorem quis</p>
<!--<a href="shop-left-sidebar-wide.html">shop now</a>-->
</div>


</div>
</div><!-- Hero Item End -->

<!-- Hero Item Start -->
<div class="hero-item hero-bg-4">
<div class="row align-items-center justify-content-between">

<!-- Hero Content -->
<div class="hero-content col-md-6 offset-md-6 col-sm-12 offset-sm-0">

<h1>THE WINTER</h1>
<h2><span>SPORT WINTER</span></h2>
<p>This is Photoshops version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
Aenean
sollicitudin, lorem quis</p>
<!--<a href="shop-left-sidebar-wide.html">shop now</a>-->

</div>
</div>
</div><!-- Hero Item End -->
</div><!-- Hero Slider End -->
</section>
<!-- end of slider  area -->


<!-- featured service section -->
<!-- featured service -->
<section class="featured-service-container mb-20">
<div class="container">
<div class="row">
<div class="col-lg-4 col-md-6">
<!-- single-feature -->
<div class="single-featured-service featured-service-bg-1">
<!--
<div class="single-featured-service-content">
<h3>Lorem ipsum dolor.</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing </p>
<a href="shop-left-sidebar-wide.html">View Collection</a>
</div>
-->
</div>
<!-- end of single feature -->
</div>
<div class="col-lg-4 col-md-6">
<!-- single-feature -->
<div class="single-featured-service featured-service-bg-2">
<!--
<div class="single-featured-service-content">
<h3>Lorem ipsum dolor.</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing </p>
<a href="shop-left-sidebar-wide.html">View Collection</a>
</div>
-->
</div>
<!-- end of single feature -->
</div>
<div class="col-lg-4 col-md-6">
<!-- single-feature -->
<div class="single-featured-service featured-service-bg-3">
<!--
<div class="single-featured-service-content">
<h3>Lorem ipsum dolor.</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing </p>
<a href="shop-left-sidebar-wide.html">View Collection</a>
</div>
-->
</div>
<!-- end of single feature -->
</div>
</div>
</div>
</section>
<!-- end of featured service -->
<!-- End of featured service section -->
<div class="homepage-content">
<div class="container">


<!-- latest product section -->

<div class="latest-product-section mb-50">
<div class="row">
<div class="col-lg-12">
<!-- Block title -->
<div class="block-title">
<h2>LATEST PRODUCTS</h2>
</div>
</div>
</div>
<div class="row">

<?php   
$unit_price="";
$discount="";    
$page=@$_GET["page"];
if($page=="" ||$page=="1"){
$page1=0;
}
else{
$page1=($page*12)-12;
}
 
$sql=$conn->prepare("SELECT * FROM product_category pc, product_type pt ,product_details pd WHERE pd.pc_id=pc.pc_id AND pd.pt_id=pt.pt_id   ORDER BY pd.pd_id DESC LIMIT $page1,12");  
$sql->execute();
$result=$sql->get_result();
$count=$result->num_rows;//For Pagination     
while($row=$result->fetch_assoc()){
$unit_price=$row["pd_price"];    
?>	
<div class="col-lg-3 col-md-4 col-sm-6">
<!-- single latest product -->
<div class="single-latest-product" style="border:0px solid #2C3E50; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-bottom:10px;">
<div class="product-image">
<a href="products_description.php?pc_id=<?php echo $row["pc_id"];?>&pt_id=<?php echo $row["pt_id"];?>&pd_id=<?php echo $row["pd_id"];?>">
<img src="admin/photo/<?php echo $row["pd_image1"];?>" class="img-fluid1" alt="" height="250" width="200">
<img src="admin/photo/<?php echo $row["pd_image2"];?>" class="img-fluid1" alt=""  height="250" width="200">
</a>
</div>
<div class="product-description">
<h5 class="product-name" style="height:40px;">
<a href="products_description.php?pc_id=<?php echo $row["pc_id"];?>&pt_id=<?php echo $row["pt_id"];?>&pd_id=<?php echo $row["pd_id"];?>">
<?php echo $row["pd_name"];?>
</a>
</h5>
<div class="price-box" style="height:40px;">
<h4>&#8377; <?php echo $unit_price;?></h4>
</div>
</div>


</div>
<!-- end of single latest product -->
</div>

<?php
}
?>


</div>
<br><br>
<!-- product pagination -->


<div class="shop-page-pagination-section d-flex justify-content-between align-items-center">
<?php
  
$sql11=$conn->prepare("SELECT * FROM product_category pc, product_type pt ,product_details pd WHERE  pd.pc_id=pc.pc_id AND pd.pt_id=pt.pt_id   ORDER BY pd.pd_id DESC ");  
$sql11->execute();
$result11=$sql11->get_result();
$count=$result11->num_rows;
$pcount=$count;
$per_page=$count/12;
$per_page=ceil($per_page);   
?>
<div class="search-result">
Showing 1 - 12 of <?php echo $pcount; ?> items
</div>
<div class="pagination-container">
<ul class="pagination justify-content-left justify-content-lg-center">
	
<?php
for($b=1;$b<=$per_page;$b++)
{
?> 
<li <?php if(isset($_REQUEST["page"])){if($_REQUEST["page"]==$b) { ?> class="active" <?php } } ?>>
<a href="index.php?page=<?php echo $b;?>"><?php echo $b." ";?></a>
</li>
<?php
}
?>
</ul>
</div>

</div>

<!-- end of product pagination -->
<hr>
</div>

<!-- end of latest product section -->
</div>
</div>

<!--====  End of homepage content section  ====-->


<!--=======================================
=            brand logo slider            =
========================================-->

<!--
<div class="brand-logo-slider mb-50">
<div class="container">
<div class="row">
<div class="col-lg-12 col-sm-12">
<div class="brand-logo-list">
-->
<!-- ======  single brand logo block  ====== -->

<!--
<div class="single-brand-logo">
<a href="#">
<img src="assets/images/brand-logos/1.jpg" alt="">
</a>
</div>
-->

<!-- ====  End of single brand logo block  ==== -->
<!-- ======  single brand logo block  ====== -->

<!--
<div class="single-brand-logo">
<a href="#">
<img src="assets/images/brand-logos/2.jpg" alt="">
</a>
</div>
-->

<!-- ====  End of single brand logo block  ==== -->
<!-- ======  single brand logo block  ====== -->

<!--
<div class="single-brand-logo">
<a href="#">
<img src="assets/images/brand-logos/3.jpg" alt="">
</a>
</div>
-->

<!-- ====  End of single brand logo block  ==== -->
<!-- ======  single brand logo block  ====== -->

<!--
<div class="single-brand-logo">
<a href="#">
<img src="assets/images/brand-logos/4.jpg" alt="">
</a>
</div>
-->

<!-- ====  End of single brand logo block  ==== -->
<!-- ======  single brand logo block  ====== -->

<!--
<div class="single-brand-logo">
<a href="#">
<img src="assets/images/brand-logos/5.jpg" alt="">
</a>
</div>
-->

<!-- ====  End of single brand logo block  ==== -->
<!-- ======  single brand logo block  ====== -->

<!--
<div class="single-brand-logo">
<a href="#">
<img src="assets/images/brand-logos/6.jpg" alt="">
</a>
</div>
-->

<!-- ====  End of single brand logo block  ==== -->
<!-- ======  single brand logo block  ====== -->

<!--
<div class="single-brand-logo">
<a href="#">
<img src="assets/images/brand-logos/7.jpg" alt="">
</a>
</div>
-->

<!-- ====  End of single brand logo block  ==== -->

<!--
</div>
</div>
</div>
</div>
</div>
-->

<!--====  End of brand logo slider  ====-->



<div class="slideshow-container">

<div class="mySlides fade">
<!--  <div class="numbertext">1 / 3</div>-->
  <img src="assets/images/brand-logos/1.png" style="width:100%">
<!--  <div class="text">Caption Text</div>-->
</div>

<div class="mySlides fade">
<!--  <div class="numbertext">2 / 3</div>-->
  <img src="assets/images/brand-logos/4.png" style="width:100%">
<!--  <div class="text">Caption Two</div>-->
</div>

<div class="mySlides fade">
<!--  <div class="numbertext">3 / 3</div>-->
  <img src="assets/images/brand-logos/12.png" style="width:100%">
<!--  <div class="text">Caption Three</div>-->
</div>

<div class="mySlides fade">
<!--  <div class="numbertext">3 / 3</div>-->
  <img src="assets/images/brand-logos/3.png" style="width:100%">
<!--  <div class="text">Caption Three</div>-->
</div>
<div class="mySlides fade">
<!--  <div class="numbertext">3 / 3</div>-->
  <img src="assets/images/brand-logos/9.jpg" style="width:100">
<!--  <div class="text">Caption Three</div>-->
</div>






</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
    
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>




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
<?php include_once("8_json_scripts.php"); ?>
</body>
</html>
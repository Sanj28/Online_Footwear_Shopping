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
<?php 
if(isset($_REQUEST["pd_id"])){
$pd_id=$_REQUEST["pd_id"];
$unit_price="";
$sql11=$conn->prepare("SELECT * FROM product_details pd,product_category pc,product_type pt WHERE pd.pd_id=? AND pd.pc_id=pc.pc_id AND pd.pt_id=pt.pt_id");
$sql11->bind_param("i",$pd_id);
$sql11->execute();
$result11=$sql11->get_result();
$row=$result11->fetch_assoc();
$pd_name=$row["pd_name"];
$unit_price=$row["pd_price"];
}
	
if(isset($_GET["typeahead"])){
$typeahead=$_GET["typeahead"];
$unit_price="";
$sql11=$conn->prepare("SELECT * FROM product_details pd,product_category pc,product_type pt WHERE pd.pd_name=? AND pd.pc_id=pc.pc_id AND pd.pt_id=pt.pt_id");
$sql11->bind_param("s",$typeahead);
$sql11->execute();
$result11=$sql11->get_result();
$row=$result11->fetch_assoc();
$pd_name=$row["pd_name"];
$unit_price=$row["pd_price"];
}
?>
<li><a href="index.php">Home</a> <span class="bc-separator">|</span></li>
<li class="active"><?php echo $pd_name; ?></li>
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
=            Single product content section            =
============================================-->

<section class="single-product-page-content">
<div class="container">
<div class="row">

<div class="col-lg-12 col-md-12">
<div class="row">

<div class="col-lg-5 col-md-7">

<div class="single-product-page-image-gallery">
<!-- product quickview image gallery -->
<!--Modal Tab Content Start-->
<div class="tab-content product-details-large">
<div class="tab-pane fade show active" id="single-slide1" role="tabpanel"
aria-labelledby="single-slide-tab-1">
<!--Single Product Image Start-->
<div class="single-product-img img-full">
<img src="admin/photo/<?php echo $row["pd_image1"];?>" class="img-fluid1" height="450" width="400" alt="">
<a href="admin/photo/<?php echo $row["pd_image1"];?>" class="big-image-popup">
<i class="fa fa-search-plus"></i></a>
</div>
<!--Single Product Image End-->
</div>
<div class="tab-pane fade" id="single-slide2" role="tabpanel" aria-labelledby="single-slide-tab-2">
<!--Single Product Image Start-->
<div class="single-product-img img-full">
<img src="admin/photo/<?php echo $row["pd_image2"];?>" class="img-fluid1" height="450" width="400" alt="">
<a href="admin/photo/<?php echo $row["pd_image2"];?>" class="big-image-popup"><i
class="fa fa-search-plus"></i></a>
</div>
<!--Single Product Image End-->
</div>
<div class="tab-pane fade" id="single-slide3" role="tabpanel" aria-labelledby="single-slide-tab-3">
<!--Single Product Image Start-->
<div class="single-product-img img-full">
<img src="admin/photo/<?php echo $row["pd_image3"];?>" class="img-fluid1" height="450" width="400" alt="">
<a href="admin/photo/<?php echo $row["pd_image3"];?>" class="big-image-popup"><i
class="fa fa-search-plus"></i></a>
</div>
<!--Single Product Image End-->
</div>
<div class="tab-pane fade" id="single-slide4" role="tabpanel" aria-labelledby="single-slide-tab-4">
<!--Single Product Image Start-->
<div class="single-product-img img-full">
<img src="admin/photo/<?php echo $row["pd_image4"];?>" class="img-fluid"class="img-fluid1" height="450" width="400" alt="">
<a href="admin/photo/<?php echo $row["pd_image4"];?>" class="big-image-popup"><i
class="fa fa-search-plus"></i></a>
</div>
<!--Single Product Image End-->
</div>
</div>
<!--Modal Content End-->
<!--Modal Tab Menu Start-->

<div class="single-product-menu">
<div class="nav single-slide-menu" role="tablist">
<div class="single-tab-menu img-full">
<a data-toggle="tab" id="single-slide-tab-1" href="#single-slide1">
<img src="admin/photo/<?php echo $row["pd_image1"];?>" class="img-fluid1" height="150" width="100" alt=""></a>
</div>
<div class="single-tab-menu img-full">
<a data-toggle="tab" id="single-slide-tab-2" href="#single-slide2">
<img src="admin/photo/<?php echo $row["pd_image2"];?>" class="img-fluid1" height="150" width="100" alt=""></a>
</div>
<div class="single-tab-menu img-full">
<a data-toggle="tab" id="single-slide-tab-3" href="#single-slide3">
<img src="admin/photo/<?php echo $row["pd_image3"];?>" class="img-fluid1" alt="" height="150" width="100"></a>
</div>
<div class="single-tab-menu img-full">
<a data-toggle="tab" id="single-slide-tab-4" href="#single-slide4">
<img src="admin/photo/<?php echo $row["pd_image4"];?>" height="150" width="100" alt=""></a>
</div>
</div>
</div>
<!--Modal Tab Menu End-->
<!-- end of product quickview image gallery -->
</div>
</div>
<div class="col-lg-7 col-md-5">
<!-- product quick view description -->
<div class="product-options">
<h2 class="product-title" style="font-size:25px;"><?php echo $row["pd_name"];?></h2>
<hr>
<h2 class="product-price" id="product__price<?php echo $row['pd_id'];?>">&#8377; <?php echo $unit_price;?></h2><br>
<p class="product-description">
<?php echo $row["pd_description"];?></p>

<div class="form-group">
<label>CHOOSE SIZE</label>
<select class="form-control" name="ps_id" id="ps_id" style="width:60%;">
<option value="">Select Size</option>
<?php
$sql22=$conn->prepare("SELECT DISTINCT(stock_details.ps_id),product_size.ps_id,product_size.ps_name FROM stock_details,product_size WHERE stock_details.pd_id= ? AND stock_details.ps_id=product_size.ps_id  ORDER BY product_size.ps_id ASC");
$sql22->bind_param("i",$_REQUEST["pd_id"]);
$sql22->execute();
$result22=$sql22->get_result();
while($row22=$result22->fetch_assoc())
{
?>
<option value="<?php echo $row22['ps_id']; ?>"><?php echo $row22['ps_name']; ?></option>
<?php
}
?>
</select>
<span id="ps_id_error"></span>
</div>
<div id="stock_status_inqty">
<div class="form-group">
<label>QTY</label>
<input class="form-control" type="number" value="1" min="1"  name="qty" id="qty<?php echo $row['pd_id'];?>" style="width:60%;">
<span id="qty_error"></span>
</div>
</div>

<!--    THIS FOR ADDING ITEMS TO CART    -->
<input type="hidden" name="pd_id" id="pd_id" value="<?php echo $row['pd_id'];?>"> 
<input type="hidden" name="pc_id" id="pc_id" value="<?php echo $row['pc_id'];?>">            
<input type="hidden" name="pt_id" id="pt_id" value="<?php echo $row['pt_id'];?>">            
<input type="hidden" name="pd_name" id="pd_name<?php echo $row['pd_id'];?>" value="<?php echo $row['pd_name'];?>">            
<input type="hidden" name="pc_tax" id="pc_tax<?php echo $row['pd_id'];?>" value="<?php echo $row['pc_discount'];?>">            
<input type="hidden" name="pd_size" id="pd_size<?php echo $row['pd_id'];?>">            
<input type="hidden" name="unit_price" id="pd_price<?php echo $row['pd_id'];?>" value="<?php echo $row['pd_price'];?>">
<input type="hidden" name="discount" id="pd_discount<?php echo $row['pd_id'];?>" value="0">
<input type="hidden" name="image" id="pd_image<?php echo $row['pd_id'];?>" value="<?php echo $row['pd_image1'];?>">
<input type="hidden" name="max_qty_allowed" id="max_qty_allowed<?php echo $row['pd_id'];?>" value="0">        
<input type="hidden" name="cart_page" id="cart_page" value="1">        
       
<hr>
<br>
<div id="stock_status_in">
	<button id="<?php echo $row['pd_id'];?>" class="btn btn-lg btn-success cart">Add to cart</button>
<button  id="<?php echo $row['pd_id'];?>" class="btn btn-lg btn-primary buyNow" style="background-color:#138496;"><i class="fa fa-play"></i>&nbsp;Buy Now</button>
</div>

<div id="stock_status_out">
<button class="btn btn-lg btn-danger" disabled style="background-color:#C9302C;">OUT OF STOCK</button>
</div>

</div>
<!-- end ofproduct quick view description -->
</div>
</div>

<div class="row">
<div class="col-lg-12">
<div class="product-description-tab-container section-padding">
<ul class="nav nav-tabs" id="myTab" role="tablist">
<li class="nav-item">
<a class="nav-link" id="home-tab" data-toggle="tab" href="#more-info"
role="tab" aria-selected="false">Description</a>
</li>
</ul>
<div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active" id="more-info" role="tabpanel"
aria-labelledby="home-tab">
<p><?php echo $row["pd_description"];?></p>
</div>

</div>
</div>
</div>
</div>

<!-- related horizontal product slider -->
<div class="horizontal-product-slider">
<div class="row">
<div class="col-lg-12">
<div class="block-title">
<h2><a href="#">RELATED PRODUCTS</a></h2>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<!-- horizontal product slider container -->
<div class="horizontal-product-list">
<!-- single product -->
<?php 
$sql="";
$result="";    
   
$unit_price="";    
$pc_id=$row["pc_id"];  
$pt_id=$row["pt_id"];  
$sql11=$conn->prepare("SELECT * FROM product_category pc, product_type pt ,product_details pd WHERE pd.pc_id=? AND pd.pt_id=? AND pd.pc_id=pc.pc_id AND pd.pt_id=pt.pt_id   ORDER BY pd.pd_id DESC LIMIT 10");  
$sql11->bind_param("ii",$pc_id,$pt_id);
$sql11->execute();
$result11=$sql11->get_result();
while($row11=$result11->fetch_assoc()){
$unit_price=$row11["pd_price"];    
?>
<div class="single-product">
<div class="single-product-content single-related-product-content" style="border:0px solid #2C3E50; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
<div class="product-image">
<a href="products_description.php?pc_id=<?php echo $row11["pc_id"];?>&pt_id=<?php echo $row11["pt_id"];?>&pd_id=<?php echo $row11["pd_id"];?>">
<img src="admin/photo/<?php echo $row11["pd_image1"];?>" class="img-fluid1" alt="" height="250" width="200">
<img src="admin/photo/<?php echo $row11["pd_image2"];?>" class="img-fluid1" alt=""  height="250" width="200">
</a>

</div>
<h5 class="product-name" style="height:40px;">
<a href="products_description.php?pc_id=<?php echo $row11["pc_id"];?>&pt_id=<?php echo $row11["pt_id"];?>&pd_id=<?php echo $row11["pd_id"];?>">
<?php echo $row11["pd_name"];?>
</a>
</h5>
<div class="price-box">
<h4>&#8377; <?php echo $unit_price;?></h4>
</div>
</div>
</div>

<?php } ?>

<!-- end of single product -->



</div>
<!-- end of horizontal product slider container -->
</div>
</div>
</div>
<!-- end of related horizontal product slider -->
</div>

</div>
</div>
</section>

<!--====  End of Single product content section  ====-->







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

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
<?php 
if(isset($_REQUEST["pc_id"])&&isset($_REQUEST["pt_id"])){
$pc_id=$_REQUEST["pc_id"];
$pt_id=$_REQUEST["pt_id"];
$sql11=$conn->prepare("SELECT * FROM product_category pc,product_type pt WHERE pt.pc_id= ? AND pt.pt_id= ? AND pt.pc_id=pc.pc_id  ");
$sql11->bind_param("ii",$pc_id,$pt_id);
$sql11->execute();
$result11=$sql11->get_result();
$row11=$result11->fetch_assoc();
$pc_name=$row11["pc_name"];
$pt_name=$row11["pt_name"];
?>
<li><a><?php echo $pc_name; ?></a><span class="bc-separator">|</span></li>
<li class="active"><?php echo $pt_name; ?></li>
<?php
}
?>

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
=            shop content section            =
============================================-->

<section class="shop-content mt-40 mb-40">
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-4">
<div class="shoppage-sidebar">
<!-- category list -->
<!-- Header Category -->
<div class="hero-side-category shop-side-category">

<h2 class="block-title"><?php echo $pc_name; ?> CATEGORIES</h2>

<!-- Category Menu -->
<nav class="shop-category-menu mb-50">
<ul>
<?php
$sql22=$conn->prepare("SELECT * FROM product_type WHERE pc_id=? ORDER BY pt_id ASC");
$sql22->bind_param("i",$_REQUEST["pc_id"]);
$sql22->execute();
$result22=$sql22->get_result();
while($row22=$result22->fetch_assoc())
{
?>
<li><a href="products.php?pc_id=<?php echo $row22['pc_id'];?>&pt_id=<?php echo $row22['pt_id'];?>"><?php echo $row22['pt_name']; ?></a></li>
<?php 
}
?>
</ul>
</nav>
<!-- end of Category menu -->
</div>
<!-- End of Header Category -->
<!-- end of category list -->



</div>
</div>
<div class="col-lg-9 col-md-8">
<div class="shop-page-container">

<div class="shop-product-wrap grid row">
<!-- ======  Shop product list  ====== -->

<?php   
$unit_price="";
$discount="";    
$page=@$_GET["page"];
if($page=="" ||$page=="1"){
$page1=0;
}
else{
$page1=($page*6)-6;
}
if(isset($_REQUEST["pc_id"]) && isset($_REQUEST["pt_id"])){
$pc_id=$_REQUEST["pc_id"];  
$pt_id=$_REQUEST["pt_id"];  
$sql=$conn->prepare("SELECT * FROM product_category pc, product_type pt ,product_details pd WHERE pd.pc_id=? AND pd.pt_id=? AND pd.pc_id=pc.pc_id AND pd.pt_id=pt.pt_id   ORDER BY pd.pd_id DESC LIMIT $page1,6");  
$sql->bind_param("ii",$pc_id,$pt_id); 
} 
	
$sql->execute();
$result=$sql->get_result();
$count=$result->num_rows;//For Pagination     
while($row=$result->fetch_assoc()){
$unit_price=$row["pd_price"];    
?>	
<div class="col-xl-4 col-lg-4 col-md-6 col-12 pb-30 pt-10">
<!-- product start -->
<div class="single-product shop-page-product single-grid-product" style="border:0px solid #2C3E50; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
<div class="single-product-content">
<div class="product-image">
<a href="products_description.php?pc_id=<?php echo $row["pc_id"];?>&pt_id=<?php echo $row["pt_id"];?>&pd_id=<?php echo $row["pd_id"];?>">
<img src="admin/photo/<?php echo $row["pd_image1"];?>" class="img-fluid1" alt="" height="250" width="200">
<img src="admin/photo/<?php echo $row["pd_image2"];?>" class="img-fluid1" alt=""  height="250" width="200">

</a>
</div>
<h5 class="product-name" style="height:40px;">
<a href="products_description.php?pc_id=<?php echo $row["pc_id"];?>&pt_id=<?php echo $row["pt_id"];?>&pd_id=<?php echo $row["pd_id"];?>">
<?php echo $row["pd_name"];?>
</a>
</h5>
<div class="price-box">
<h4>&#8377; <?php echo $unit_price;?></h4>
</div>

</div>

</div>
<!-- product end -->

</div>
<?php
}
?>


<!-- ====  End of Shop product list  ==== -->
</div>

<!-- product pagination -->


<div class="shop-page-pagination-section d-flex justify-content-between align-items-center">
<?php
if(isset($_REQUEST["pc_id"]) && isset($_REQUEST["pt_id"])){
$pc_id=$_REQUEST["pc_id"];  
$pt_id=$_REQUEST["pt_id"];  
$sql11=$conn->prepare("SELECT * FROM product_category pc, product_type pt ,product_details pd WHERE pd.pc_id=? AND pd.pt_id=? AND pd.pc_id=pc.pc_id AND pd.pt_id=pt.pt_id   ORDER BY pd.pd_id DESC ");  
$sql11->bind_param("ii",$pc_id,$pt_id);  
$sql11->execute();
$result11=$sql11->get_result();
$count=$result11->num_rows;
$pcount=$count;
$per_page=$count/6;
$per_page=ceil($per_page);   
?>
<div class="search-result">
Showing 1 - 6 of <?php echo $pcount; ?> items
</div>
<div class="pagination-container">
<ul class="pagination justify-content-left justify-content-lg-center">
	
<?php
for($b=1;$b<=$per_page;$b++)
{
?> 
<li <?php if(isset($_REQUEST["page"])){if($_REQUEST["page"]==$b) { ?> class="active" <?php } } ?>>
<a href="products.php?pc_id=<?php echo $pc_id;?>&pt_id=<?php echo $pt_id;?>&page=<?php echo $b;?>"><?php echo $b." ";?></a>
</li>
<?php
}
?>
</ul>
</div>
<?php
}
?>
</div>

<!-- end of product pagination -->

</div>
</div>
</div>
</div>
</section>

<!--====  End of shop content section  ====-->




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
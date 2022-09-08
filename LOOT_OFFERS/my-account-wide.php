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
<li class="active">MY ACCOUNT</li>
</ul>
</div>
</div>
</div>
</div>
</div>
<!-- end of breadcrumb section -->
</header>
<!--====  End of Header   ====-->


<!--=============================================
=            My account page            =
=============================================-->

<div class="myaccount-area page-content section-padding">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="page-title">
<h2>My Account</h2>
</div>
</div>
</div>
<div class="row">
<div class="ml-auto mr-auto col-lg-9">
<div class="myaccount-wrapper">

<div id="accordion">
<div class="card">
<div class="card-header" id="headingOne">
<h5 class="mb-0">
<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
aria-expanded="true" aria-controls="collapseOne">
1. Edit your account information <span> <i class="fa fa-chevron-down"></i>
<i class="fa fa-chevron-up"></i> </span>
</button>
</h5>
</div>

<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
<div class="card-body">
<div class="billing-information-wrapper">
<div class="account-info-wrapper">
<h4>My Account Information</h4>
<h5>Your Personal Details</h5>
</div>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="billing-info">
<label>First Name</label>
<input type="text">
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="billing-info">
<label>Last Name</label>
<input type="text">
</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="billing-info">
<label>Email Address</label>
<input type="email">
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="billing-info">
<label>Telephone</label>
<input type="text">
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="billing-info">
<label>Fax</label>
<input type="text">
</div>
</div>
</div>
<div class="billing-back-btn text-right">

<div class="billing-btn">
<button type="submit">Continue</button>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="card">
<div class="card-header" id="headingTwo">
<h5 class="mb-0">
<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
aria-expanded="false" aria-controls="collapseTwo">
2. Change your password <span> <i class="fa fa-chevron-down"></i> <i class="fa fa-chevron-up"></i>
</span>
</button>
</h5>
</div>
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
<div class="card-body">
<div class="billing-information-wrapper">
<div class="account-info-wrapper">
<h4>Change Password</h4>
<h5>Your Password</h5>
</div>
<div class="row">
<div class="col-lg-12 col-md-12">
<div class="billing-info">
<label>Password</label>
<input type="password">
</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="billing-info">
<label>Password Confirm</label>
<input type="password">
</div>
</div>
</div>
<div class="billing-back-btn">

<div class="billing-btn text-right">
<button type="submit">Continue</button>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="card">
<div class="card-header" id="headingThree">
<h5 class="mb-0">
<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
aria-expanded="false" aria-controls="collapseThree">
3. Modify your address book entries <span> <i class="fa fa-chevron-down"></i>
<i class="fa fa-chevron-up"></i> </span>
</button>
</h5>
</div>
<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
<div class="card-body">
<div class="billing-information-wrapper">
<div class="account-info-wrapper">
<h4>Address Book Entries</h4>
</div>
<div class="entries-wrapper">
<div class="row">
<div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
<div class="entries-info text-center">
<p>Farhana hayder (shuvo) </p>
<p>hastech </p>
<p> Road#1 , Block#c </p>
<p> Rampura. </p>
<p>Dhaka </p>
<p>Bangladesh </p>
</div>
</div>
<div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
<div class="entries-edit-delete text-center">
<a class="edit-btn" href="#">Edit</a>
<a class="del-btn" href="#">Delete</a>
</div>
</div>
</div>
</div>
<div class="billing-back-btn">

<div class="billing-btn text-right mt-10">
<button type="submit">Continue</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!--=====  End of My account page  ======-->



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
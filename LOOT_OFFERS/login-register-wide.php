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
<li class="active">LOGIN - REGISTER</li>
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
=            Login / register content section            =
============================================-->

<div class="account-area page-content">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="page-title">
<h2>Login - Register</h2>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-xs-12 mb-30">
<!-- Login Form s-->
<form action="#" class="login-form">

<div id="login-form">
<h4 class="login-title">Login</h4>

<div class="row">
<div class="col-md-12 col-12 mb-20">
<label>Email Address*</label>
<input class="mb-0" type="email" placeholder="Email Address">
</div>
<div class="col-12 mb-20">
<label>Password</label>
<input class="mb-0" type="password" placeholder="Password">
</div>
<div class="col-md-8">
<button class="register-button mt-0">Login</button>
<div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
<input type="checkbox" id="remember_me">
<label for="remember_me">Remember me</label>
</div>
</div>

<div class="col-md-4 mt-10 text-left text-md-right">
<a href="#"> Forgotten pasward?</a>
</div>

</div>
</div>

</form>
</div>
<div class="col-sm-6 col-xs-12">
<form action="#" class="login-form">

<div id="register-form">
<h4 class="login-title">Register</h4>

<div class="row">
<div class="col-md-6 col-12 mb-20">
<label>First Name</label>
<input class="mb-0" type="text" placeholder="First Name">
</div>
<div class="col-md-6 col-12 mb-20">
<label>Last Name</label>
<input class="mb-0" type="text" placeholder="Last Name">
</div>
<div class="col-md-12 mb-20">
<label>Email Address*</label>
<input class="mb-0" type="email" placeholder="Email Address">
</div>
<div class="col-md-6 mb-20">
<label>Password</label>
<input class="mb-0" type="password" placeholder="Password">
</div>
<div class="col-md-6 mb-20">
<label>Confirm Password</label>
<input class="mb-0" type="password" placeholder="Confirm Password">
</div>
<div class="col-12">
<button class="register-button mt-0">Register</button>
</div>
</div>
</div>

</form>
</div>
</div>
</div>
</div>

<!--====  End of Login / register content section  ====-->



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
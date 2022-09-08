<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
<title>Login | LOOT OFFERS</title>
<?php include_once("1_meta_tags.php"); ?>
</head>
<body class="vertical-layout vertical-menu-modern semi-dark-layout 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" data-layout="semi-dark-layout">

<div class="app-content content">
<div class="content-overlay"></div>
<div class="content-wrapper">
<div class="content-header row">
</div>
<div class="content-body">

<!-- login page start -->
<section id="auth-login" class="row flexbox-container">
<div class="col-xl-8 col-11">
<div class="card bg-authentication mb-0">
<div class="row m-0">
<!-- left section-login -->
<div class="col-md-6 col-12 px-0">
<div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
<div class="card-header pb-1">
<div class="card-title">
<h4 class="text-center mb-2">LOOT OFFERS</h4>
</div>
</div>
<div class="card-content">
<div class="card-body">

<form action="login_check.php" method="post" enctype="multipart/form-data">
<div class="form-group mb-50">
<label class="text-bold-600">Username</label>
<input type="text" name="ad_username" id="ad_username" class="form-control" placeholder="Username">
</div>

<div class="form-group">
<label class="text-bold-600">Password</label>
<input type="password" name="ad_password" id="ad_password" class="form-control" placeholder="Password">
</div>

<button type="submit" class="btn btn-primary glow w-100 position-relative">Login<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
</form>

<hr>
<div class="text-center">
<a href="admin_forgot_password.php">Forgot Password?</a>
</div>

</div>
</div>
</div>
</div>
<!-- right section image -->
<div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
<div class="card-content">
<img class="img-fluid" src="../admin/vendors/app-assets/images/pages/login.png" alt="branding logo">
</div>
</div>
</div>
</div>
</div>
</section>
<!-- login page ends -->

</div>
</div>
</div>


<?php include_once("2_footer_scripts.php"); ?>

</body>
<!-- END: Body-->
</html>
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

<!--CONTACT FORM-->
<div class="card-content" id="contactShow">
<div class="card-body">

<form id="contact_form" method="post" enctype="multipart/form-data">
<input type="hidden" name="type" id="type" class="form-control" value="CONTACT">
<div class="form-group">
<label class="text-bold-600">Mobile Number</label>
<input type="text" class="form-control" id="ad_contact" name="ad_contact" placeholder="ENTER MOBILE NUMBER">
<span id="ad_contact_error"></span>
</div>

<button type="submit" class="btn btn-primary glow w-100 position-relative">SEND OTP<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
</form>

<hr>
<div class="text-center">
<a href="index.php">LOGIN</a>
</div>

</div>
</div>
<!--CONTACT FORM-->



<!--CHANGE PASSWORD FORM-->
<div class="card-content" id="changePassoword">
<div class="card-body">

<form id="change_password" method="post" enctype="multipart/form-data">
<input type="hidden" name="type" id="type" class="form-control" value="CHANGEPASSWORD">

<div class="form-group">
<input type="text" class="form-control" id="otp" name="otp" placeholder="ENTER OTP">
<span id="otp_error"></span>
</div>
<div class="form-group">
<input type="text" class="form-control" id="new_password" name="new_password" placeholder="NEW PASSWORD">
<span id="new_password_error"></span>
</div>
<div class="form-group">
<input type="text" class="form-control" id="confirm_password" name="confirm_password" placeholder="CONFIRM PASSWORD">
<span id="confirm_password_error"></span>
</div>

<button type="submit" class="btn btn-primary glow w-100 position-relative">CHANGE PASSWORD<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
</form>

<hr>
<div class="text-center">
<a href="index.php">LOGIN</a>
</div>

</div>
</div>
<!--CHANGE PASSWORD FORM-->

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
<script type="text/javascript">    
$(document).ready(function(){
$('#changePassoword').hide();    
    
    
    
$(document).on('submit', '#contact_form', function(event) {
event.preventDefault(); 
    
    alert();
var ad_contact = '';
var formData = new FormData($('#contact_form')[0]);    
ad_contact = phoneno('ad_contact', 'ad_contact_error', 'Contact Number');
if (ad_contact == 1) 
{
    $.ajax({
    url: "admin_forgot_password_check.php",
    method: 'POST',
    data: formData,
    contentType: false,
    processData: false,
    dataType: "json",    
    success: function(data)
    {
        if(data.message_error==1)
        {
            alert("Contact Number Not Found!!");    
        }
        if(data.message_error==0)
        {

            $('#contactShow').hide();
            $('#changePassoword').show();    
        }
    }
    });   
}
});
    
    
    
    
    
    

$(document).on('submit', '#change_password', function(event) {
event.preventDefault(); 
var otp = '';
var new_password = '';
var confirm_password = '';
var formData = new FormData($('#change_password')[0]);    
otp = fieldrequired('otp', 'otp_error', 'Otp');
new_password = pasword('new_password', 'new_password_error', 'New Password');    
confirm_password = pasword('confirm_password', 'confirm_password_error', 'Confirm Password');
if (otp == 1 && new_password == 1 && confirm_password == 1) 
{
$.ajax({
url: "admin_forgot_password_check.php",
method: 'POST',
data: formData,
contentType: false,
processData: false,
dataType: "json",    
success: function(data)
{
if(data.message_error==1)
{
alert("NEW & CONFIRM PASSWORD DOES NOT MATCH");    
}
else if(data.message_error==2)
{
alert("INVALID OTP");    
}
if(data.message_error==0)
{
alert("PASSWORD CHANGED SUCCESSFULLY");    
window.location.href = "index.php";   
}
}
});   
}
});    
});       
</script>  
</body>
<!-- END: Body-->
</html>

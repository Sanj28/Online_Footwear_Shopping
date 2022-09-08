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
<li class="active">FORGOT PASSWORD</li>
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
<div class="col-lg-3 col-sm-3 col-xs-12 col-md-12 mb-30">
</div>
<!--CONTACT FORM    -->
<div class="col-lg-6 col-sm-6 col-xs-12 col-md-12 mb-30" id="contactShow">
<form id="contact_form" class="login-form">
<div id="login-form">
<h4 class="login-title">FORGOT PASSWORD</h4>
<input class="form-control" type="hidden" name="type" id="type" value="CONTACT">
<div class="row">
<div class="col-md-12 col-12 mb-20">
<label>ENTER MOBILE NUMBER</label>
<input class="mb-0" type="text" placeholder="Enter Registered Contact Number" name="cu_contact" id="cu_contact">
<span id="cu_contact_error"></span> 
</div>
	
<div class="col-md-12">
<button class="register-button mt-0">SEND OTP</button>
</div>
	
<div class="col-md-12 mt-10 text-left text-md-right">
<a href="customer_login_register.php">LOGIN</a>
</div>

</div>
</div>

</form>
</div>
<!--CONTACT FORM    -->
	
	
	
<!--CHANGE PASSWORD FORM    -->
<div class="col-lg-6 col-sm-6 col-xs-12 col-md-12 mb-30" id="changePassoword">
<form id="change_password" class="login-form">
<div id="login-form">
<h4 class="login-title">CHANGE PASSWORD</h4>
<input class="form-control" type="hidden" name="type" id="type" value="CHANGEPASSWORD">
<div class="row">
<div class="col-md-12 col-12 mb-20">
<label>Enter OTP</label>
<input class="mb-0" type="text" placeholder="Enter OTP" name="otp" id="otp">
<span id="otp_error"></span>
</div>
<div class="col-12 mb-20">
<label>NEW PASSWORD</label>
<input class="mb-0" type="text" placeholder="Enter New Password" name="new_password" id="new_password">
<span id="new_password_error"></span>
</div>
<div class="col-md-12 col-12 mb-20">
<label>Confirm Password</label>
<input class="mb-0" type="text" placeholder="Enter Confirm Password" name="confirm_password" id="confirm_password">
<span id="confirm_password_error"></span>
</div>
<div class="col-md-12">
<button class="register-button mt-0">CHANGE PASSWORD</button>
</div>
<div class="col-md-12 mt-10 text-left text-md-right">
<a href="customer_login_register.php">LOGIN</a>
</div>

</div>
</div>

</form>
</div>
<!--CHANGE PASSWORD FORM    -->
	
	
	
<div class="col-lg-3 col-sm-3 col-xs-12 col-md-12 mb-30">
</div>

</div>
</div>
</div>
<br><br><br>	
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
<?php include_once("8_json_scripts.php"); ?>
<script type="text/javascript">    
$(document).ready(function(){
$('#changePassoword').hide();    
$(document).on('submit', '#contact_form', function(event) {
event.preventDefault(); 
var ad_contact = '';
var formData = new FormData($('#contact_form')[0]);    
cu_contact = phoneno('cu_contact', 'cu_contact_error', 'Contact Number');
if (cu_contact == 1) 
{
 $.ajax({
    url: "customer/forgot_contact_check.php",
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
//			alert(data.message_error2);
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
    url: "customer/forgot_contact_check.php",
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
            window.location.href = "customer_login_register.php";   
        }
    }
});   
}
});    
});       
</script>
</body>
</html>
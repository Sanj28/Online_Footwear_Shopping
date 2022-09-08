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
<div class="col-sm-6 col-xs-12 mb-30">
<!-- Login Form s-->
<form action="customer/customer_login_check.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateLoginForm()" class="login-form">
<?php 
if(isset($_POST["product_details_url"])){
?>
<input type="hidden" name="product_details_url" value="<?php echo $_POST['product_details_url'];?>">                                
<?php
}else
{
?>                                
<input type="hidden" name="product_details_url" value="NAN">                                 
<?php
}
?> 
<div id="login-form">
<h4 class="login-title">Login</h4>

<div class="row">
<div class="col-md-12 col-12 mb-20">
<label>Enter Username</label>
<input type="text" name="cu_username_login" placeholder="Username" id="cu_username_login" class="mb-0">
<span id="cu_username_login_error"></span> 
</div>
<div class="col-12 mb-20">
<label>Enter Password</label>
<input type="text" name="cu_password_login" placeholder="Password" id="cu_password_login" class="mb-0">
<span id="cu_password_login_error"></span>
</div>
<div class="col-md-12">
<button class="register-button mt-0">Login</button>
<div class="check-box d-inline-block ml-0 ml-md-2 mt-10">

</div>
</div>
<div class="col-md-12 mt-10 text-left text-md-right">
<a href="customer_forgot_password.php"> Forgotten Password..?</a>
</div>

</div>
</div>

</form>
</div>

<div class="col-sm-6 col-xs-12">
<form action="customer/customer_insert.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateForm()" class="login-form">

<div id="register-form">
<h4 class="login-title">Register</h4>

<div class="row">
<div class="col-md-12 col-12 mb-20">
<label>Fullname</label>
<input type="text" name="cu_name" placeholder="FullName" id="cu_name" class="mb-0">
<span id="cu_name_error"></span>
</div>
<div class="col-md-6 col-12 mb-20">
<label>Contact</label>
<input type="text" name="cu_contact" placeholder="Contact" id="cu_contact" class="mb-0">
<span id="cu_contact_error"></span>
</div>
<div class="col-md-6 mb-20">
<label>Email</label>
<input type="text" name="cu_email" placeholder="Email" id="cu_email" class="mb-0">
<span id="cu_email_error"></span>
</div>
<div class="col-md-12 mb-20">
<label>Address</label>
<input type="text" id="cu_address" name="cu_address" class="mb-0" placeholder="Address">
<span id="cu_address_error"></span>
</div>
<div class="col-md-6 mb-20">
<label>Username</label>
<input type="text" name="cu_username" placeholder="Username" id="cu_username" class="mb-0">
<span id="cu_username_error"></span>
</div>
<div class="col-md-6 mb-20">
<label>Password</label>
<input type="text" name="cu_password" placeholder="Password" id="cu_password" class="mb-0">
<span id="cu_password_error"></span>
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
function ValidateForm()
{
var cu_name = '';
var cu_contact = '';
var cu_email = '';
var cu_address = '';
var cu_username = '';
var cu_password = '';                

cu_name = alphabets('cu_name', 'cu_name_error', 'Name');
cu_contact = phoneno('cu_contact', 'cu_contact_error', 'Contact Number');
cu_email = emailid('cu_email', 'cu_email_error', 'Email');
cu_address = fieldrequired('cu_address', 'cu_address_error', 'Address');
cu_username = fieldrequired('cu_username', 'cu_username_error', 'Username');
cu_password = pasword('cu_password', 'cu_password_error', 'Password');

if (cu_name == 1 && cu_contact == 1 && cu_email == 1 && cu_address == 1 && cu_username == 1 && cu_password == 1) 
{
    return true;
}
else
{
    return false;
}
}
</script>
   
<script type="text/javascript">
function ValidateLoginForm()
{
	var cu_username_login = '';
	var cu_password_login = '';                            

	cu_username_login = fieldrequired('cu_username_login', 'cu_username_login_error', 'Username');
	cu_password_login = pasword('cu_password_login', 'cu_password_login_error', 'Password');

	if (cu_username_login == 1 && cu_password_login == 1) 
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>
</body>
</html>

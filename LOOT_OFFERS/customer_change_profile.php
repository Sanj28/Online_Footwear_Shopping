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
<li class="active">CHANGE PASSWORD - PROFILE</li>
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
<form action="customer/customer_change_password_update.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateLoginForm()" class="login-form">
<input type="hidden" name="cu_id" id="cu_id" class="form-control" value="<?php echo $cu_id;?>">
<div id="login-form">
<h4 class="login-title">CHANGE PASSWORD</h4>

<div class="row">
<div class="col-md-12 col-12 mb-20">
<label>Enter Old Password</label>
<input type="text" name="old_password"placeholder="Old Password" id="old_password" class="mb-0">
<span id="old_password_error"></span>
</div>

<div class="col-12 mb-20">
<label>Enter New Password</label>
<input type="text" name="new_password" placeholder="New Password" id="new_password" class="mb-0">
<span id="new_password_error"></span>
</div>

<div class="col-12 mb-20">
<label>Confirm Password</label>
<input type="text" name="confirm_password" placeholder="Confirm Password" id="confirm_password" class="mb-0">
<span id="confirm_password_error"></span>
</div>

<div class="col-md-12">
<button class="register-button mt-0">CHANGE PASSWORD</button>
</div>


</div>
</div>

</form>
</div>

<div class="col-sm-6 col-xs-12">
<form action="customer/customer_profile_update.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateForm()" class="login-form">
<input type="hidden" name="cu_id" id="cu_id" class="form-control" value="<?php echo $cu_id;?>">
<div id="register-form">
<h4 class="login-title">UPDATE PROFILE</h4>

<div class="row">
<div class="col-md-12 col-12 mb-20">
<label>Fullname</label>
<input type="text" name="cu_name" placeholder="FullName" id="cu_name" class="mb-0" value="<?php echo $fullname;?>">
<span id="cu_name_error"></span>
</div>
<div class="col-md-6 col-12 mb-20">
<label>Contact</label>
<input type="text" name="cu_contact" placeholder="Contact" id="cu_contact" class="mb-0" value="<?php echo $cu_contact;?>">
<span id="cu_contact_error"></span>
</div>
<div class="col-md-6 mb-20">
<label>Email</label>
<input type="text" name="cu_email" placeholder="Email" id="cu_email" class="mb-0" value="<?php echo $cu_email;?>">
<span id="cu_email_error"></span>
</div>
<div class="col-md-12 mb-20">
<label>Address</label>
<input type="text" id="cu_address" name="cu_address" class="mb-0" placeholder="Address" value="<?php echo $cu_address ;?>">
<span id="cu_address_error"></span>
</div>

<div class="col-12">
<button class="register-button mt-0">UPDATE PROFILE</button>
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

cu_name = alphabets('cu_name', 'cu_name_error', 'Name');
cu_contact = phoneno('cu_contact', 'cu_contact_error', 'Contact Number');
cu_email = emailid('cu_email', 'cu_email_error', 'Email');
cu_address = fieldrequired('cu_address', 'cu_address_error', 'Address');

if (cu_name == 1 && cu_contact == 1 && cu_email == 1 && cu_address == 1) 
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
		var old_password = '';
		var new_password = '';
		var confirm_password = '';                            

		old_password = pasword('old_password', 'old_password_error', 'Old Password');
		new_password = pasword('new_password', 'new_password_error', 'New Password');
		confirm_password = pasword('confirm_password', 'confirm_password_error', 'Confirm Password');

		if (old_password == 1 && new_password == 1 && confirm_password == 1) 
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

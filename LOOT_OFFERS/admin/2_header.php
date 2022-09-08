<div class="header-navbar-shadow"></div>
<nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top " style="background-color: rgb(255, 255, 255); box-shadow: rgba(25, 42, 70, 0.13) -8px 12px 18px 0px;">
<div class="navbar-wrapper" style="background-color:#FFFFFF">
<div class="navbar-container content">
<div class="navbar-collapse" id="navbar-mobile">
<div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
<ul class="nav navbar-nav">
<li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon bx bx-menu"></i></a></li>
</ul>
</div>
	
<?php
$status="ORDER PLACED";
$sql=$conn->prepare("SELECT * FROM customer_order_details WHERE order_status = ? ");
$sql->bind_param("s",$status);
$sql->execute();
$result=$sql->get_result();
$count=$result->num_rows;

$sd_status="OUT OF STOCK";
$sql1=$conn->prepare("SELECT * FROM stock_details WHERE sd_status=?");
$sql1->bind_param("s",$sd_status);
$sql1->execute();
$result1=$sql1->get_result();
$count1=$result1->num_rows;

?>
<ul class="nav navbar-nav float-right">

<li class="dropdown dropdown-notification nav-item">
<a class="nav-link nav-link-label" href="stock_out_dated.php">
<button class="btn btn-sm btn-danger">&nbsp;OUT OF STOCK&nbsp;</button>
<span class="badge badge-pill badge-danger badge-up"><?php echo $count1; ?></span>
</a>
</li>
	
<li class="dropdown dropdown-notification nav-item">
<a class="nav-link nav-link-label" href="customer_order_placed.php">
<i class="ficon bx bx-bell bx-tada bx-flip-horizontal"></i>
<span class="badge badge-pill badge-danger badge-up"><?php echo $count; ?></span>
</a>
</li>

<li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
<div class="user-nav d-sm-flex d-none">
<span class="user-name">Welcome,<?php echo $admin_name; ?></span>

</div>
<span><img class="round" src="vendors/app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40"></span>
</a>
<div class="dropdown-menu dropdown-menu-right pb-0">

<a class="dropdown-item" href="admin_edit.php">
<i class="bx bx-user mr-50"></i> Edit Profile</a>

<a class="dropdown-item" href="admin_change_password.php">
<i class="bx bx-key mr-50"></i>CHANGE PASSWORD</a>

<div class="dropdown-divider mb-0"></div>
<a class="dropdown-item" href="admin_logout.php">
<i class="bx bx-power-off mr-50"></i> LOGOUT</a>

</div>
</li>
</ul>
</div>
</div>
</div>
</nav>
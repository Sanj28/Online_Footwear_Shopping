<?php
require("../6_db_connection.php");
// $customer_id=$_POST["cu_id"];
$customer_name=$_POST["cu_name"];
$customer_contact=$_POST["cu_contact"];
$customer_email=$_POST["cu_email"];
$customer_address=$_POST["cu_address"];
$customer_username=$_POST["cu_username"];
$customer_password=base64_encode($_POST["cu_password"]);
$customer_date=date('Y-m-d');

$sql1=$conn->prepare("SELECT * FROM customer WHERE cu_contact=?");
$sql1->bind_param("i",$customer_contact);
$sql1->execute();
$result1=$sql1->get_result();

$sql2=$conn->prepare("SELECT * FROM customer WHERE cu_email=?");
$sql2->bind_param("s",$customer_email);
$sql2->execute();
$result2=$sql2->get_result();

$sql3=$conn->prepare("SELECT * FROM customer WHERE cu_username=?");
$sql3->bind_param("s",$customer_username);
$sql3->execute();
$result3=$sql3->get_result();

if($result1->num_rows>0){
echo"<script type='text/javascript'>
alert('CONTACT NUMBER EXISTS!!!!');
history.back();
</script>";    
}
else if($result2->num_rows>0){
echo"<script type='text/javascript'>
alert('EMAIL EXISTS!!!!');
history.back();
</script>";        
}
else if($result3->num_rows>0){
echo"<script type='text/javascript'>
alert('USERNAME EXISTS!!!!');
history.back();
</script>";        
}
else{
$sql=$conn->prepare("INSERT INTO customer(cu_name,cu_contact,cu_email,cu_address,cu_username,cu_password,cu_date)VALUES(?,?,?,?,?,?,?)");
$sql->bind_param("sisssss",$customer_name,$customer_contact,$customer_email,$customer_address,$customer_username,$customer_password,$customer_date);
if($sql->execute())
{
echo"<script type='text/javascript'>alert('SUCCESSFULLY REGISTERED');
window.location='../customer_login_register.php'
</script>";
}
else
{
echo"<script type='text/javascript'>alert('NOT REGISTERED');
window.location='../customer_login_register.php'
</script>";
}
}    
?>
<?php
if(isset($_SESSION['customer']))
{
$customer_session=TRUE;
$sql=$conn->prepare("SELECT * FROM customer WHERE cu_username=?");
$sql->bind_param("s",$_SESSION["customer"]);
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_assoc();
$fullname=$row["cu_name"];
$cu_contact=$row["cu_contact"];
$cu_email=$row["cu_email"];
$cu_address=$row["cu_address"];
$cu_username=$row["cu_username"];
$cu_id=$row['cu_id'];
$password_enc=$row['cu_password'];
$password=base64_decode($password_enc);

$order_no="";
$characters = array_merge(range('0','9'));
for ($i = 0; $i < 6; $i++) 
{
    $rand = mt_rand(0, count($characters)-1);
    $order_no .= $characters[$rand];
}

}
else
{
    $customer_session=FALSE;
}
?>
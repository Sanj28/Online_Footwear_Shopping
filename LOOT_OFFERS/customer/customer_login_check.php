<?php
require("../6_db_connection.php");
session_start();
$customer_username=$_POST["cu_username_login"];
$customer_password=$_POST["cu_password_login"];
$sql=$conn->prepare("SELECT * FROM customer WHERE cu_username=?");
$sql->bind_param("s",$customer_username);
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_assoc();
$enc_password=$row['cu_password'];
$dec_password=base64_decode($enc_password);  
$url=$_POST["product_details_url"];
if($customer_password==$dec_password)
{
    $_SESSION['customer']=$customer_username;                
    if($url!="NAN")
    {
        header('Location: '.$url);
    }    
    else
    {
        header('Location:../index.php');
    }
}
else
{           
            echo "<script type='text/javascript'>
            alert('USERNAME AND PASSWORD INVALID');
            window.location='../customer_login_register.php';
            </script>";                         
}
?>
<?php
include_once("../db_connection.php");
$cu_id=$_POST['cu_id'];
$cu_name=$_POST['cu_name'];
$cu_contact=$_POST['cu_contact'];
$cu_email=$_POST['cu_email'];
$cu_address=$_POST['cu_address'];
$cu_username=$_POST['cu_username'];
$cu_password=$_POST['cu_password'];
$cu_date=$_POST['cu_date'];

$sql1=$conn->prepare("SELECT * FROM customer WHERE cu_contact=? AND cu_id!=?");
$sql1->bind_param("ii",$cu_contact,$cu_id);
$sql1->execute();
$result1=$sql1->get_result();
$contact_count=$result1->num_rows;

$sql2=$conn->prepare("SELECT * FROM customer WHERE cu_email=? AND cu_id!=?");
$sql2->bind_param("si",$cu_email,$cu_id);
$sql2->execute();
$result2=$sql2->get_result();
$email_count=$result2->num_rows;

$sql3=$conn->prepare("SELECT * FROM customer WHERE cu_username=? AND cu_id!=?");
$sql3->bind_param("si",$cu_username,$cu_id);
$sql3->execute();
$result3=$sql3->get_result();
$username_count=$result3->num_rows;

if($contact_count>0)
{
    
      echo "<script type='text/javascript'>
    alert('CONTACT ALREADY EXIST');
   history.back();
    </script>";
}

else if($email_count>0)
{
   echo "<script type='text/javascript'>
    alert('EMAIL ALREADY EXIST');
   history.back();
    </script>";   
}

else if($username_count>0)
{
    echo "<script type='text/javascript'>
    alert('USERNAME ALREADY EXIST');
  history.back();
    </script>";   
}
else
{
$sql=$conn->prepare("UPDATE customer SET cu_name=?,cu_contact=?,cu_email=?,cu_address=?,cu_username=?,cu_password=?,cu_date=? WHERE cu_id=?");

$sql->bind_param("sisssssi",$cu_name,$cu_contact,$cu_email,$cu_address,$cu_username,$cu_password,$cu_date,$cu_id);

if($sql->execute())
{
    echo "<script type='text/javascript'> 
    alert('RECORD UPDATED');
    window.location='customer_view.php';
    </script>";
}
else
{
    echo"<script type='text/javascript'>
    alert('NOT UPDATED');
    window.location='customer_view.php';
    </script>";
}
}
?>
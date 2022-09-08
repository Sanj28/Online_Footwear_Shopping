<?php
include_once("../db_connection.php");

$cu_name=$_POST['cu_name'];
$cu_contact=$_POST['cu_contact'];
$cu_email=$_POST['cu_email'];
$cu_address=$_POST['cu_address'];
$cu_username=$_POST['cu_username'];
$cu_password=$_POST['cu_password'];
$cu_date=$_POST['cu_date'];

$sql1=$conn->prepare("SELECT * FROM customer WHERE cu_contact=?");
$sql1->bind_param("i",$cu_contact);
$sql1->execute();
$result1=$sql1->get_result();
$contact_count=$result1->num_rows;

$sql2=$conn->prepare("SELECT * FROM customer WHERE cu_email=?");
$sql2->bind_param("s",$cu_email);
$sql2->execute();
$result2=$sql2->get_result();
$email_count=$result2->num_rows;

$sql3=$conn->prepare("SELECT * FROM customer WHERE cu_username=?");
$sql3->bind_param("s",$cu_username);
$sql3->execute();
$result3=$sql3->get_result();
$username_count=$result3->num_rows;


if($contact_count>0)
{
    
      echo "<script type='text/javascript'>
    alert('RECORD ALREADY EXIST');
    window.location='customer_view.php';
    </script>";
}



else if($email_count>0)
{
   echo "<script type='text/javascript'>
    alert('RECORD ALREADY EXIST');
   window.location='customer_view.php';
    </script>";   
}


else if($username_count>0)
{
    echo "<script type='text/javascript'>
    alert('RECORD ALREADY EXIST');
  window.location='customer_view.php';
    </script>";   
}
else
{
        
$sql=$conn->prepare("INSERT INTO customer(cu_name,cu_contact,cu_email,cu_address,cu_username,cu_password,cu_date) VALUES(?,?,?,?,?,?,?)");
$sql->bind_param("sisssss",$cu_name,$cu_contact,$cu_email,$cu_address,$cu_username,$cu_password,$cu_date);
if($sql->execute())
{
    echo "<script type='text/javascript'> 
    alert('RECORD INSERTED');
   window.location='customer_view.php';
    </script>";
}
else
{
    echo"<script type='text/javascript'>
    alert('NOT INSERTED');
  window.location='customer_view.php';
    </script>";
}
}
?>
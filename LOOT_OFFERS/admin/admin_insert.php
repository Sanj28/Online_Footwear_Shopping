<?php
include_once("../db_connection.php");    
$ad_name=$_POST['ad_name']; //super golbes
$ad_contact=$_POST['ad_contact'];
$ad_address=$_POST['ad_address'];
$ad_email=$_POST['ad_email'];
$ad_username=$_POST['ad_username'];
$ad_password=base64_encode($_POST['ad_password']);
$ad_date=$_POST['ad_date'];
$sql=$conn->prepare("SELECT * FROM admin");
    $sql->execute();
    $result=$sql->get_result();
    $count=$result->num_rows;
  if($count>0)
    {
       echo "<script type='text/javascript'>
       alert('RECORD ALREADY EXIST');
       window.location='admin_view.php';
       </script>";
     
   }
  else
  {
     $sql=$conn->prepare("INSERT INTO admin(ad_name,ad_contact,ad_address,ad_email,ad_username,ad_password,ad_date) VALUES(?,?,?,?,?,?,?)");
      $sql->bind_param("sisssss",$ad_name,$ad_contact,$ad_address,$ad_email,$ad_username,$ad_password,$ad_date);

     if($sql->execute())
     {
        echo "<script type='text/javascript'>
        alert('RECORD INSERTED');
        window.location='admin_view.php';
        </script>";
    }
    else
    {
       echo "<script type='text/javascript'>
       alert('NOT INSERTED');
       </script>";
    }
 }
?>
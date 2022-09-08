<?php
include_once("../db_connection.php");
$ad_id=$_POST['ad_id'];
$ad_name=$_POST['ad_name']; //super golbes
$ad_contact=$_POST['ad_contact'];
$ad_address=$_POST['ad_address'];
$ad_email=$_POST['ad_email'];
//$ad_username=$_POST['ad_username'];
//$ad_password=$_POST['ad_password'];
$ad_date=$_POST['ad_date'];

$sql1=$conn->prepare("SELECT * FROM admin WHERE ad_id!=?");
$sql1->bind_param("i",$ad_id);
$sql1->execute();
$result1=$sql1->get_result();
$count=$result1->num_rows;

if($count>0)
{
    echo "<script type='text/javascript'>
    alert('RECORD ALREADY EXIST');
     window.history.back();
    </script>";
}
 
else
{
$sql=$conn->prepare("UPDATE admin SET ad_name=?,ad_contact=?,ad_address=?,ad_email=?,ad_date=? WHERE ad_id=?");

$sql->bind_param("sisssi",$ad_name,$ad_contact,$ad_address,$ad_email,$ad_date,$ad_id);
if($sql->execute())
{
    echo "<script type='text/javascript'>
    alert('RECORD UPDATED');
     window.location='admin_edit.php';
    </script>";
}
else
{
    echo "<script type='text/javascript'>
    alert('NOT UPDATED');
     window.location='admin_edit.php';
    </script>";
}
}
?>
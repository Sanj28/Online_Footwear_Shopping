<?php
include_once("../db_connection.php");
$pt_id=$_POST['pt_id'];
$pc_id=$_POST['pc_id'];
$pt_name=$_POST['pt_name'];
$pt_date=$_POST['pt_date'];

$sql1=$conn->prepare("SELECT * FROM product_type WHERE pc_id = ? AND pt_name=? AND pt_id!=?");
$sql1->bind_param("isi",$pc_id,$pt_name,$pt_id);
$sql1->execute();
$result1=$sql1->get_result();
$count=$result1->num_rows;

if($count>0)
{
    echo "<script type='text/javascript'>
    alert('RECORD ALREADY EXIST');
     window.location='product_type_view.php';
    </script>";
}
else
{
$sql=$conn->prepare("UPDATE product_type SET pc_id = ?,pt_name=?,pt_date=? WHERE pt_id=?");

$sql->bind_param("issi",$pc_id,$pt_name,$pt_date,$pt_id);

if($sql->execute())
{
    echo "<script type='text/javascript'>
    alert('RECORD UPDATED');
    window.location='product_type_view.php';
    </script>";
}
else
{
    echo "<script type='text/javascript'>
    alert('NOT UPDATED);
    window.location='product_type_view.php';
    </script>";
}
}
?>
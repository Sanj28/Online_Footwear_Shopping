<?php
include_once("../db_connection.php");
$ps_id=$_POST['ps_id'];
$ps_name=$_POST['ps_name'];

$sql1=$conn->prepare("SELECT * FROM product_size WHERE ps_name=? AND ps_id!=?");
$sql1->bind_param("si",$ps_name,$ps_id);
$sql1->execute();
$result1=$sql1->get_result();
$count=$result1->num_rows;

if($count>0)
{
    echo "<script type='text/javascript'>
    alert('RECORD ALREADY EXIST');
     window.location='product_size_view.php';
    </script>";
}
else
{
$sql=$conn->prepare("UPDATE product_size SET ps_name=? WHERE ps_id=?");

$sql->bind_param("si",$ps_name,$ps_id);

if($sql->execute())
{
    echo "<script type='text/javascript'>
    alert('RECORD UPDATED');
    window.location='product_size_view.php';
    </script>";
}
else
{
    echo "<script type='text/javascript'>
    alert('NOT UPDATED);
    window.location='product_size_view.php';
    </script>";
}
}
?>
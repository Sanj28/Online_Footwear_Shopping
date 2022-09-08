<?php

 include_once("../db_connection.php");
 $pc_id=$_POST['pc_id'];
 $pc_name=$_POST['pc_name'];
 $pc_discount=$_POST['pc_discount'];

$sql1=$conn->prepare("SELECT * FROM product_category WHERE pc_name=? AND pc_id!=?");
$sql1->bind_param("si",$pc_name,$pc_id);
$sql1->execute();
$result1=$sql1->get_result();
$count=$result1->num_rows;

if($count>0)
{
    echo "<script type='text/javascript'>
    alert('RECORD ALREADY EXIST');
    history.back();
    </script>";
}
else
{
$sql=$conn->prepare("UPDATE product_category SET pc_name=?,pc_discount=? WHERE pc_id=?");

$sql->bind_param("sii",$pc_name,$pc_discount,$pc_id);

if($sql->execute())
{    
    echo "<script type='text/javascript'>
    alert('RECORD UPDATED');
    window.location='product_category_view.php';
    </script>";
}
else
{
    echo "<script type='text/javascript'>
    alert('NOT UPDATED');
    window.location='product_category_view.php';
    </script>";
}
    }
?>
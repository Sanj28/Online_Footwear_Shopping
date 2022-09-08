<?php

 include_once("../db_connection.php");
 $pc_name=$_POST['pc_name'];
 $pc_discount=$_POST['pc_discount'];

$sql1=$conn->prepare("SELECT * FROM product_category WHERE pc_name=?");
$sql1->bind_param("s",$pc_name);
$sql1->execute();
$result1=$sql1->get_result();
$count=$result1->num_rows;
if($count>0)
{
    echo "<script type='text/javascript'>
    alert('RECORD EXIST');
     window.location='product_category_view.php';
    </script>";
}
else
{
    
$sql=$conn->prepare("INSERT INTO product_category(pc_name,pc_discount) VALUES(?,?)");

$sql->bind_param("si",$pc_name,$pc_discount);

if($sql->execute())
{    
    echo "<script type='text/javascript'>
    alert('RECORD INSERTED');
    window.location='product_category_view.php';
    </script>";
}
else
{
    echo "<script type='text/javascript'>
    alert('NOT INSERTED');
    window.location='product_category_view.php';
    </script>";
}
    }
?>
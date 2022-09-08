<?php
include_once("../db_connection.php");

$pt_id=$_REQUEST["id"];

$sql=$conn->prepare("DELETE FROM product_type WHERE pt_id=?");
$sql->bind_param("i",$pt_id);
if($sql->execute())
{
    echo "<script type='text/javascript'>
    alert('RECORD DELETED');
    window.location='product_type_view.php';
    </script>";
}
else
{
    echo "<script type='text/javascript'>
    alert('RECORD NOT DELETED');
    window.location='product_type_view.php';
    </script>";   
}
    
?>    
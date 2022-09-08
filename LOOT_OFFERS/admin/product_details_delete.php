<?php
include_once("../db_connection.php");

$pd_id=$_REQUEST["id"];

$sql=$conn->prepare("DELETE FROM product_details WHERE pd_id=?");
$sql->bind_param("i",$pd_id);
if($sql->execute())
{
    echo "<script type='text/javascript'>
    alert('RECORD DELETED');
    window.location='product_details_view.php';
    </script>";
}
else
{
    echo "<script type='text/javascript'>
    alert('RECORD NOT DELETED');
    window.location='product_details_view.php';
    </script>";   
}
    
?>    
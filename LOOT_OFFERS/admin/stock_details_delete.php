<?php
include_once("../db_connection.php");

$sd_id=$_REQUEST["id"];

$sql=$conn->prepare("DELETE FROM stock_details WHERE sd_id=?");
$sql->bind_param("i",$sd_id);
if($sql->execute())
{
    echo "<script type='text/javascript'>
    alert('RECORD DELETED');
    window.location='stock_details_view.php';
    </script>";
}
else
{
    echo "<script type='text/javascript'>
    alert('RECORD NOT DELETED');
    window.location='stock_details_view.php';
    </script>";   
}
    
?>    
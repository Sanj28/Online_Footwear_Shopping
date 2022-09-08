<?php
include_once("../db_connection.php");

$cu_id=$_REQUEST["id"];

$sql=$conn->prepare("DELETE FROM customer WHERE cu_id=?");
$sql->bind_param("i",$cu_id);
if($sql->execute())
{
    echo "<script type='text/javascript'>
    alert('RECORD DELETED');
    window.location='customer_view.php';
    </script>";
}
else
{
    echo "<script type='text/javascript'>
    alert('RECORD NOT DELETED');
    window.location='customer_view.php';
    </script>";   
}
    
?>    
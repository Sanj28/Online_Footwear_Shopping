<?php
include_once("../db_connection.php");

$ps_name=$_POST['ps_name'];

$sql1=$conn->prepare("SELECT * FROM product_size WHERE  ps_name=?");
$sql1->bind_param("s",$ps_name);
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

$sql=$conn->prepare("INSERT INTO product_size(ps_name) VALUES(?)");

$sql->bind_param("s",$ps_name);

if($sql->execute())
{
    echo "<script type='text/javascript'>
    alert('RECORD INSERTED');
    window.location='product_size_view.php';
    </script>";
}
else
{
    echo "<script type='text/javascript'>
    alert('NOT INSERT);
    window.location='product_size_view.php';
    </script>";
}
}
?>
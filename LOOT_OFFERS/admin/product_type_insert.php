<?php
include_once("../db_connection.php");

$pc_id=$_POST['pc_id'];
$pt_name=$_POST['pt_name'];
$pt_date=$_POST['pt_date'];

$sql1=$conn->prepare("SELECT * FROM product_type WHERE pc_id = ? AND pt_name=?");
$sql1->bind_param("is",$pc_id,$pt_name);
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

$sql=$conn->prepare("INSERT INTO product_type(pc_id,pt_name,pt_date) VALUES(?,?,?)");

$sql->bind_param("iss",$pc_id,$pt_name,$pt_date);

if($sql->execute())
{
    echo "<script type='text/javascript'>
    alert('RECORD INSERTED');
    window.location='product_type_view.php';
    </script>";
}
else
{
    echo "<script type='text/javascript'>
    alert('NOT INSERT);
    window.location='product_type_view.php';
    </script>";
}
}
?>
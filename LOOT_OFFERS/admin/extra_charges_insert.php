<?php
include_once("../db_connection.php");

$ec_min_amount=$_POST['ec_min_amount'];
$ec_delivery_charges=$_POST['ec_delivery_charges'];
$ec_min_stock_qty=$_POST['ec_min_stock_qty'];
$ec_date=$_POST['ec_date'];
$sql=$conn->prepare("SELECT * FROM extra_charges");
$sql->execute();
    $result=$sql->get_result();
    $count=$result->num_rows;
  if($count>0)
  {
   
      echo "<script type='text/javascript'>
    alert('RECORD EXIST');
     window.location='extra_charges_view.php';
    </script>";
}
else
{
    
$sql=$conn->prepare("INSERT INTO extra_charges(ec_min_amount,ec_delivery_charges,ec_min_stock_qty,ec_date) VALUES(?,?,?,?)");

$sql->bind_param("iiis",$ec_min_amount,$ec_delivery_charges,$ec_min_stock_qty,$ec_date);

if($sql->execute())
{
    echo "<script type='text/javascript'>
    alert('RECORD INSERTED');
    window.location='extra_charges_view.php';
    </script>";
}
else
{
    echo "<script type='text/javascript'>
    alert('NOT INSERTED');
    window.location='extra_charges_view.php';
    </script>";
}
}


?>
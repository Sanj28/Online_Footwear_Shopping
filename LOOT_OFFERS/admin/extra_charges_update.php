<?php
include_once("../db_connection.php");
$ec_id=$_POST['ec_id'];
$ec_min_amount=$_POST['ec_min_amount'];
$ec_delivery_charges=$_POST['ec_delivery_charges'];
$ec_min_stock_qty=$_POST['ec_min_stock_qty'];
$ec_date=$_POST['ec_date'];

$sql1=$conn->prepare("SELECT * FROM extra_charges WHERE ec_id!=?");
$sql1->bind_param("i",$ec_id);
$sql1->execute();
$result1=$sql1->get_result();
$count=$result1->num_rows;

if($count>0)
{
    echo "<script type='text/javascript'>
    alert('RECORD ALREADY EXIST');
     window.history.back();
     </script>";
}
 
else
{
$sql=$conn->prepare("UPDATE extra_charges SET  ec_min_amount=?,ec_delivery_charges=?,ec_min_stock_qty=?,ec_date=? WHERE ec_id=?");
$sql->bind_param("iiisi",$ec_min_amount,$ec_delivery_charges,$ec_min_stock_qty,$ec_date,$ec_id);

if($sql->execute())
   {
        echo "<script type='text/javascript'>
    alert('RECORD UPDATED');
    window.location='extra_charges_view.php';
    </script>"; 
   }
   else
   {
       echo "<script type='text/javascript'>
    alert('RECORD NOT UPDATED');
     window.location='extra_charges_edit.php';
    </script>"; 
   }
}

?>



<!--
<?php
include_once("../db_connection.php");
$ec_id=$_POST['ec_id'];
$ec_min_amount=$_POST['ec_min_amount'];
$ec_delivery_charges=$_POST['ec_delivery_charges'];
$ec_min_stock_qty=$_POST['ec_min_stock_qty'];
$ec_date=$_POST['ec_date'];

$sql1=$conn->prepare("SELECT * FROM extra_charges WHERE ec_id!=?");
$sql1->bind_param("i",$ec_id);
$sql1->execute();
$result1=$sql1->get_result();
$count=$result1->num_rows;

if($count>0)
{
    echo "<script type='text/javascript'>
    alert('RECORD ALREADY EXIST');
     window.history.back();
    </script>";
}
 else{
$sql=$conn->prepare("UPDATE extra_charges SET  ec_min_amount=?,ec_delivery_charges=?,ec_min_stock_qty=?,ec_date=? WHERE ec_id=?");
$sql->bind_param("iiisi",$ec_min_amount,$ec_delivery_charges,$ec_min_stock_qty,$ec_date,$ec_id);

if($sql->execute())
{
    echo "<script type='text/javascript'>
    alert('RECORD UPDATED');
    window.location='extra_charges_view.php';
    </script>";
}
else
{
    echo "<script type='text/javascript'>
    alert('NOT UPDATED');
    window.location='extra_charges_view.php';
    </script>";
}
}
?>-->

<?php
require("../6_db_connection.php");
$sd_id=$_POST["sd_id"];
$pd_id=$_POST["pd_id"];
$ps_id=$_POST["ps_id"];
$sd_avail_qty=$_POST["sd_avail_qty"];
$sd_unitprice=$_POST["sd_unitprice"];
$sd_increment=$_POST["sd_increment"];
$sd_discount=$_POST["sd_discount"];
$sd_max_qty_order=$_POST["sd_max_qty_order"];
$sd_status=$_POST["sd_status"];

$sql_pd=$conn->prepare("SELECT * FROM product_details WHERE pd_id=? ");
$sql_pd->bind_param("i",$pd_id);
$sql_pd->execute();
$result_pd=$sql_pd->get_result();
$row_pd=$result_pd->fetch_assoc();
$pc_id=$row_pd["pc_id"];
$pt_id=$row_pd["pt_id"];

$sql_ec=$conn->prepare("SELECT * FROM extra_charges ");
$sql_ec->execute();
$result_ec=$sql_ec->get_result();
$row_ec=$result_ec->fetch_assoc();
$min_qty=$row_ec["ec_min_stock_qty"];

$sql=$conn->prepare("SELECT * FROM stock_details WHERE pd_id=? AND ps_id=? AND sd_id !=?");
$sql->bind_param("iii",$pd_id,$ps_id,$sd_id);
$sql->execute();
$result=$sql->get_result();
$count=$result->num_rows;

if($count>0)

{
   echo"<script type='text/javascript'>
    alert('RECORD exists');
    history.back();
    </script>"; 
}
else if($sd_avail_qty < $min_qty)
{
	echo"<script type='text/javascript'>
    alert('STOCK QUANTITY LESS THAN MINIMUM QUANTITY..!');
    history.back();
    </script>"; 
}
else
{
	$sql=$conn->prepare("UPDATE stock_details SET pd_id=?,pc_id=?,pt_id=?,ps_id=?,sd_avail_qty=?,sd_unitprice=?,sd_increment=?,sd_discount=?,sd_max_qty_order=?,sd_status=? WHERE sd_id=?");
	$sql->bind_param("iiiiiiiiisi",$pd_id,$pc_id,$pt_id,$ps_id,$sd_avail_qty,$sd_unitprice,$sd_increment,$sd_discount,$sd_max_qty_order,$sd_status,$sd_id);
	if($sql->execute())
	{
		echo"<script type='text/javascript'>
		alert('UPDATED SUCCESSFULLY');
		window.location='stock_details_view.php';
		</script>";
	}
	else
	{
		echo"<script type='text/javascript'>
		alert('NOT UPDATED');
		window.location='stock_details_view.php';
		</script>";
	}
}
?>
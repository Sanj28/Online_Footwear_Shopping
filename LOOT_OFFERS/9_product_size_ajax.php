<?php
require("6_db_connection.php");

if(!empty($_POST["ps_id"])){
	
	$ps_id=$_POST["ps_id"];
	$pc_id=$_POST["pc_id"];
	$pt_id=$_POST["pt_id"];
	$pd_id=$_POST["pd_id"];
	$output = array();
	
    $sql=$conn->prepare("SELECT * FROM stock_details,product_size WHERE stock_details.pd_id=? AND stock_details.pc_id=? AND stock_details.pt_id=? AND stock_details.ps_id=? AND stock_details.ps_id=product_size.ps_id");
    $sql->bind_param("iiii",$pd_id,$pc_id,$pt_id,$ps_id);
    $sql->execute();
    $result=$sql->get_result()->fetch_all(MYSQLI_ASSOC);
    
	foreach($result as $row)
	{
		if($row["sd_discount"]!=0)
		{
			$unit_price=$row["sd_unitprice"]-$row["sd_discount"]; 
			$discount=$row["sd_unitprice"];
			$pd_price_new="&#8377; $unit_price <del>&#8377; $discount</del>";
		}
		else
		{
			$unit_price=$row["sd_unitprice"];    
			$discount=0; 
			$pd_price_new="&#8377; $unit_price";
		}
		$output["pd_id"] = $row["pd_id"];
		$output["pd_price"] = $row["sd_unitprice"];
		$output["pd_discount"] = $row["sd_discount"];
		$output["max_qty_allowed"] = $row["sd_max_qty_order"];
		$output["pd_price_new"] = $pd_price_new;
		$output["stock_status"] = $row["sd_status"];
		$output["pd_size"] = $row["ps_name"];
	}
	
	echo json_encode($output);
}
?>
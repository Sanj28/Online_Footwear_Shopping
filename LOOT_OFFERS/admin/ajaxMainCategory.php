<?php
require("../6_db_connection.php");

if(!empty($_POST["pc_id"])){
	
	$pc_id=$_POST["pc_id"];
    //echo $pc_id;
    $sql=$conn->prepare("SELECT * FROM product_type WHERE pc_id=? ORDER BY pt_id ASC");
    $sql->bind_param("i",$pc_id);
    $sql->execute();
    $result=$sql->get_result();
    $rowCount=$result->num_rows;
    $subdata="";
    if($rowCount > 0){
        $subdata.='<option value="">--SELECT PRODUCT TYPE--</option>';
        while($row = $result->fetch_assoc())
        { 
            $subdata.='<option value="'.$row['pt_id'].'">'.$row['pt_name'].'</option>';
        }
    }else{
        $subdata.='<option value="">--PRODUCT TYPE NOT AVAILABLE--</option>';
    }
	
	 $data = array(
            'subdata'     => $subdata
        );
	echo json_encode($data);
}

if(!empty($_POST["pd_id"])){
	
	$pd_id=$_POST["pd_id"];
    //echo $mc_id;
	$sql=$conn->prepare("SELECT * FROM product_details WHERE pd_id=?");
	$sql->bind_param("i",$pd_id);
	$sql->execute();
	$result=$sql->get_result();
	$row=$result->fetch_assoc();
	$pd_price=$row['pd_price'];
	
	$data = array(
            'pd_price'     => $pd_price
        );
	
	echo json_encode($data);
}
?>
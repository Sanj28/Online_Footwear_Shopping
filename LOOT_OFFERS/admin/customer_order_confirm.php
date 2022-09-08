<?php
    require("../6_db_connection.php");
    $orderno=$_POST['orderno'];
    $customer_id=$_POST['cu_id'];    
    $customer_contact=$_POST['cu_contact'];    
    $customer_name=$_POST['cu_name'];    
    $grand_total=$_POST['grand_total'];    
    $order_status="ORDER CONFIRMED";
    $date=date("Y-m-d");


	$sql1=$conn->prepare("SELECT * from extra_charges");
	$sql1->execute();
	$result1=$sql1->get_result();
	$row1=$result1->fetch_assoc();
	$min_stock_qty=$row1["ec_min_stock_qty"];

    $sql1=$conn->prepare("SELECT * FROM customer c,customer_order_details cod WHERE c.cu_id=cod.cu_id AND cod.cu_id=? ORDER BY cod.cod_id DESC");
    $sql1->bind_param("i",$customer_id);
    $sql1->execute();
    $result1=$sql1->get_result();
    $row1=$result1->fetch_assoc();
    $json_array = json_decode($row1["order_json"],true);
    foreach($json_array["product_details"] as $row) 
    {    
        $sql2=$conn->prepare("SELECT * FROM stock_details WHERE pd_id=?");
        $sql2->bind_param("i",$row["id"]);
        $sql2->execute();
        $result2=$sql2->get_result();
        $row2=$result2->fetch_assoc();
        $old_qty=$row2["sd_avail_qty"];
        $new_qty=$old_qty-$row["qty"];        
        
		if($new_qty<$min_stock_qty)
		{
		$stock_status="OUT OF STOCK";
		}
		else
		{
		$stock_status="IN STOCK";
		}
	
		$sql3=$conn->prepare("UPDATE stock_details SET sd_avail_qty=?,sd_status=? WHERE sd_id=?");
		$sql3->bind_param("isi",$new_qty,$stock_status,$row2["sd_id"]);
		$sql3->execute();
    }   
    
    $sql=$conn->prepare("UPDATE customer_order_details SET order_status=? WHERE cu_id=? AND order_no=?");
    $sql->bind_param("sii",$order_status,$customer_id,$orderno);
    if($sql->execute()){        
     
   $message = "$customer_name Your ORDER NO :$orderno Has Been Confirmed Successfully of Rs.$grand_total, Will be Delivered Withing 4-6 Days.";
   $data=urlencode($message);
   $sms_url="http://bhashsms.com/api/sendmsg.php?user=innovics&pass=Inn0vic$201908&sender=INVSIT&phone=$customer_contact&text=$data&priority=ndnd&stype=normal";
   $content = file_get_contents($sms_url);        


    echo"<script type='text/javascript'>
    alert('ORDER CONFIRMED');
    window.location='customer_order_placed.php';
    </script>";
    }
    else
    {
        echo"<script type='text/javascript'>
    alert('NOT CONFIRMED');
    window.location='customer_order_placed.php';
    </script>";
    }    
    
?>  
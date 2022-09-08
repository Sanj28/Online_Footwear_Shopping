<?php 
session_start();
require('6_db_connection.php');
require('5_customer_session_data.php');

$itemsJson=$_POST["itemsJson"];
$buyNow_itemsJson=$_POST["buyNow_itemsJson"];
$jsondata="";
$json_array="";
$grand_total="";

if($itemsJson!="")
{
    $jsondata=$itemsJson;
    $json_array = json_decode($itemsJson,true);   
    $grand_total=$json_array["amount_details"]["grand_total"];
}
else
{
    $jsondata=$buyNow_itemsJson;
    $json_array = json_decode($buyNow_itemsJson,true);   
    $grand_total=$json_array["amount_details"]["grand_total"];
}
$cu_id=$_POST["cu_id"];
$order_no=$_POST["order_no"];
$order_date=$_POST["order_date"];
$order_status="ORDER PLACED";

$sql=$conn->prepare("INSERT INTO customer_order_details(cu_id,order_json,order_no,order_date,order_grand_total,order_status)VALUES(?,?,?,?,?,?)");
$sql->bind_param("isssss",$cu_id,$jsondata,$order_no,$order_date,$grand_total,$order_status);
if($sql->execute())
{
 
   $message = "$fullname Your ORDER NO :$order_no Has Been Placed Successfully,Will Confirm Your Order Soon";
   $data=urlencode($message);
   $sms_url="http://bhashsms.com/api/sendmsg.php?user=innovics&pass=Inn0vic$201908&sender=INVSIT&phone=$cu_contact&text=$data&priority=ndnd&stype=normal";
   $content = file_get_contents($sms_url);   

    echo"<script type='text/javascript'>
    alert('ORDER PLACED SUCCESSFULLY');
    localStorage.clear();	    	
    window.location='index.php';
    </script>";
}
else{
    echo"<script type='text/javascript'>
    alert('ORDER NOT PLACED!!!');
    window.history.back();
    </script>";
}
?>

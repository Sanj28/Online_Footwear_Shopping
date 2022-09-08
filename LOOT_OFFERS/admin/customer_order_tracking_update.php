<?php 
require("../6_db_connection.php");
$tracking_json=$_POST["tracking_json"];
$tracking_status=$_POST["tracking_status"];
$cu_id=$_POST["cu_id"];
$orderno=$_POST["orderno"];
$status="ORDER TRACKING STATUS UPDATED";
//$json_array = json_decode($tracking_json,true);
// $message = "$fullname Your ORDER NO :$order_no Has Been Placed Successfully,Will Confirm Your Order Soon";
// $data=urlencode($message);
// $sms_url="http://bhashsms.com/api/sendmsg.php?user=innovics&pass=1234567890&sender=INVSIT&phone=$contact_no&text=$data&priority=ndnd&stype=normal";
    
$sql=$conn->prepare("UPDATE customer_order_details SET order_tracking=?,order_tracking_level=? WHERE order_no=? AND cu_id=?");
$sql->bind_param("siss",$tracking_json,$tracking_status,$orderno,$cu_id);
if($sql->execute())
{
         $data = array(
            'status'          => $status,
            'tracking_status'=>$tracking_status
        );
        $status = '';            
        echo json_encode($data);   
}
?>

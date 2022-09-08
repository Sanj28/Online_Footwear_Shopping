<?php
session_start();
require("../6_db_connection.php");
if($_POST["type"]=="CONTACT"){
$customer_contact=$_POST["cu_contact"];
$output = array();
$sql=$conn->prepare("SELECT * FROM customer WHERE cu_contact=?");
$sql->bind_param("s",$customer_contact);
$sql->execute();
$result=$sql->get_result();
if($result->num_rows>0)
{
    $row=$result->fetch_assoc();
    $cu_id=$row['cu_id'];    
    $cu_name=$row['cu_name'];    
    $cu_contact=$row['cu_contact'];    
    
    $rndno=rand(1000, 9999);
    $message = "$cu_name Your OTP is $rndno, Do Not Share Your OTP.";
    $data=urlencode($message);
    $sms_url="http://bhashsms.com/api/sendmsg.php?user=innovics&pass=Inn0vic$201908&sender=INVSIT&phone=$cu_contact&text=$data&priority=ndnd&stype=normal";
    $content = file_get_contents($sms_url);
    $_SESSION['cu_id']=$cu_id;
    $_SESSION['otp_generated']=$rndno;   
    $output["message_error"]=0;        
    $output["otp_generated"]=$rndno;        
}
else
{
$output["message_error"]=1;    
}
echo json_encode($output);
}


//FOR CHANGE PASSWORD

if($_POST["type"]=="CHANGEPASSWORD")
{
    $cu_id=$_SESSION["cu_id"];
    $otp_generated=$_SESSION["otp_generated"];
    $otp=$_POST["otp"];
    $new_password=$_POST["new_password"];
    $confirm_password=$_POST["confirm_password"];
    $password_enc=base64_encode($new_password);
    if($otp==$otp_generated)
    {
        if($new_password==$confirm_password)
        {
            $sql=$conn->prepare("UPDATE customer SET cu_password=? WHERE cu_id=?");
            $sql->bind_param("si",$password_enc,$cu_id);
            $sql->execute();
            $output["message_error"]=0;                    
        }
        else
        {
            $output["message_error"]=1;                    
        }
    }
    else
    {
        $output["message_error"]=2;            
    }
    echo json_encode($output);
}
?>
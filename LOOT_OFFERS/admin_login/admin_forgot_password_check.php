<?php
session_start();
require("../db_connection.php");
if($_POST["type"]=="CONTACT")
{
$admin_contact=$_POST["ad_contact"];
$output = array();
$sql=$conn->prepare("SELECT * FROM admin WHERE ad_contact=?");
$sql->bind_param("s",$admin_contact);
$sql->execute();
$result=$sql->get_result();
if($result->num_rows>0)
{
    $row=$result->fetch_assoc();
    $ad_id=$row['ad_id'];    
    $ad_name=$row['ad_name'];    
    $ad_contact=$row['ad_contact'];    
    
    $rndno=rand(1000, 9999);
    $message = "$ad_name Your OTP is $rndno, Do Not Share Your OTP.";
    $data=urlencode($message);
    $sms_url="http://bhashsms.com/api/sendmsg.php?user=innovics&pass=Inn0vic$201908&sender=INVSIT&phone=$ad_contact&text=$data&priority=ndnd&stype=normal";
    $content = file_get_contents($sms_url);
    $_SESSION['ad_id']=$ad_id;
    $_SESSION['otp_generated']=$rndno;   
    $output["message_error"]=0;        
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
    $ad_id=$_SESSION["ad_id"];
    $otp_generated=$_SESSION["otp_generated"];
    $otp=$_POST["otp"];
    $new_password=$_POST["new_password"];
    $confirm_password=$_POST["confirm_password"];
    $password_enc=base64_encode($new_password);
    if($otp==$otp_generated)
    {
        if($new_password==$confirm_password)
        {
            $sql=$conn->prepare("UPDATE admin SET ad_password=? WHERE ad_id=?");
            $sql->bind_param("si",$password_enc,$ad_id);
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
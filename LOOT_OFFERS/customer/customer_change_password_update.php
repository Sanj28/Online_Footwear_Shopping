<?php
session_start();
include_once("../6_db_connection.php");
include_once("../5_customer_session_data.php");
$cu_id=$_POST["cu_id"];
$old_password=$_POST["old_password"];
$new_password=$_POST["new_password"];
$confirm_password=$_POST["confirm_password"];
$enc_new_password=base64_encode($new_password);
if($old_password==$password)
{
    if($new_password==$confirm_password)
    {
        $sql=$conn->prepare("UPDATE customer SET cu_password=? WHERE cu_id=?");    
        $sql->bind_param("si",$enc_new_password,$cu_id);
        if($sql->execute())
        {
        echo"<script type='text/javascript'>
        alert('PASSWORD UPDATED SUCCESSFULLY');
        window.location='../customer_change_profile.php';
        </script>";                    
        }
        else
        {
        echo"<script type='text/javascript'>
        alert('PASSWORD NOT UPDATED');
        history.back();
        </script>";                            
        }
        
    }
    else
    {
        echo"<script type='text/javascript'>
        alert('OLD PASSWORD & NEW PASSWORD IS INCORRECT');
        history.back();
        </script>";                
    }
}
else
{
echo"<script type='text/javascript'>
alert('OLD PASSWORD IS INCORRECT');
history.back();
</script>";        
}
?>
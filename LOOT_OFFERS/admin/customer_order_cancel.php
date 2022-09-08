<?php
    require("../6_db_connection.php");

    $cod_id=$_POST['cod_id'];
    $orderno=$_POST['orderno'];
    $customer_contact=$_POST['cu_contact'];    
    $customer_name=$_POST['cu_name'];       
      
    $sql=$conn->prepare("DELETE FROM customer_order_details WHERE cod_id=?");
    $sql->bind_param("i",$cod_id);
    if($sql->execute()){
    $msg="$customer_name Your Order : $orderno Has Been Cancelled Sorry For Inconvenience.";
    $data=urlencode($msg);
    $sms="http://bhashsms.com/api/sendmsg.php?user=innovics&pass=Inn0vic$201908&sender=INVSIT&phone=$customer_contact&text=$data&priority=ndnd&stype=normal";
    $content = file_get_contents($sms);

    echo"<script type='text/javascript'>
    alert('ORDER CANCELLED');
    window.location='customer_order_placed.php';
    </script>";
    }
    else
    {
    echo"<script type='text/javascript'>
    alert('NOT CANCELLED');
    window.location='customer_order_placed.php';
    </script>";
    }    
    
?>  
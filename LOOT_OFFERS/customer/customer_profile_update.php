<?php
    require("../6_db_connection.php");
    $customer_id=$_POST["cu_id"];
    $customer_name=$_POST["cu_name"];
    $customer_contact=$_POST["cu_contact"];
    $customer_email=$_POST["cu_email"];
    $customer_address=$_POST["cu_address"];
    $customer_date=date("Y-m-d");

    $sql1=$conn->prepare("SELECT * FROM customer WHERE cu_contact=? AND cu_id!=?");
    $sql1->bind_param("ii",$customer_contact,$customer_id);
    $sql1->execute();
    $result1=$sql1->get_result();

    $sql2=$conn->prepare("SELECT * FROM customer WHERE cu_email=? AND cu_id!=?");
    $sql2->bind_param("si",$customer_email,$customer_id);
    $sql2->execute();
    $result2=$sql2->get_result();

    if($result1->num_rows>0){
    echo"<script type='text/javascript'>
    alert('CONTACT NUMBER EXISTS!!!!');
    window.location='../customer_change_profile.php';
    </script>";    
    }
    else if($result2->num_rows>0){
    echo"<script type='text/javascript'>
    alert('EMAIL EXISTS!!!!');
    window.location='../customer_change_profile.php';
    </script>";        
    }
    else{
    $sql=$conn->prepare("UPDATE customer SET cu_name=?,cu_contact=?,cu_email=?,cu_address=?,cu_date=? WHERE cu_id=?");
    $sql->bind_param("sisssi",$customer_name,$customer_contact,$customer_email,$customer_address,$customer_date,$customer_id);

    if($sql->execute())
    {
    echo"<script type='text/javascript'>
    alert('SUCCESSFULLY UPDATED');
    history.back();
    </script>";
    }
    else
    {
    echo"<script type='text/javascript'>
    alert('NOT UPDATED');
    history.back();
    </script>";
    }
    }
?>
<?php
require("../../6_db_connection.php");
$key=$_GET['key'];
$array = array();   
$query=$conn->prepare("select * from product_details where pd_name LIKE '%{$key}%'");
$query->execute();
$result=$query->get_result();
while($row=$result->fetch_assoc())
{
    $array[] = $row['pd_name'];      
    //        $array[] = $row['pd_id'];      
}
echo json_encode($array);
?>

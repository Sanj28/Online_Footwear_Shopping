<?php
//database_connection.php
$conn="";
$servername="localhost";
$username="root";
$password="";
$dbname="loot_offers";

$conn=new mysqli($servername,$username,$password,$dbname);
date_default_timezone_set('Asia/Kolkata');

if($conn->connect_errno)
{
    echo "FAILED TO CONNECT :";
    die;
}
?>
<?php
include_once("../db_connection.php");
include_once("6_function.php");
$pd_id=$_POST['pd_id'];
$pc_id=$_POST['pc_id'];
$pt_id=$_POST['pt_id'];
$pd_name=$_POST['pd_name'];


$pd_description=$_POST['pd_description'];
$pd_price=$_POST['pd_price'];
$pd_date=$_POST['pd_date'];

$sql1=$conn->prepare("SELECT * FROM product_details WHERE pc_id=? AND pt_id=? AND pd_name=? AND pd_id!=?");
$sql1->bind_param("iisi",$pc_id,$pt_id,$pd_name,$pd_id);
$sql1->execute();
$result1=$sql1->get_result();
$count=$result1->num_rows;

if($count>0)
{
    echo "<script type='text/javascript'>
    alert('RECORD ALREADY EXIST');
    history.back();
    </script>";
}
 
else
{
	$folder="photo/";

$pd_image1=$_FILES['pd_image1']['name'];

if(empty($pd_image1))
{
    $pd_image1=$_POST["old_pd_image1"];
}
else
{    
    $tmp_pd_image1=$_FILES['pd_image1']['tmp_name'];
    $pd_image1=upload_image($pd_image1,$tmp_pd_image1,$folder);
}
  
$pd_image2=$_FILES['pd_image2']['name']; 
if(empty($pd_image2))
{
    $pd_image2=$_POST["old_pd_image2"];
}
else
{
    $tmp_pd_image2=$_FILES['pd_image2']['tmp_name'];
    $pd_image2=upload_image($pd_image2,$tmp_pd_image2,$folder);
}
$pd_image3=$_FILES['pd_image3']['name'];
if(empty($pd_image3))
{
    $pd_image3=$_POST["old_pd_image3"];
}
else
{
$tmp_pd_image3=$_FILES['pd_image3']['tmp_name'];
$pd_image3=upload_image($pd_image3,$tmp_pd_image3,$folder);
}
$pd_image4=$_FILES['pd_image4']['name'];
if(empty($pd_image4))
{
    $pd_image4=$_POST["old_pd_image4"];
}
else
{
$tmp_pd_image4=$_FILES['pd_image4']['tmp_name'];
$pd_image4=upload_image($pd_image4,$tmp_pd_image4,$folder);
}
	
$sql=$conn->prepare("UPDATE product_details SET pc_id=?,pt_id=?,pd_name=?,pd_image1=?,pd_image2=?,pd_image3=?,pd_image4=?,pd_description=?,pd_price=?,pd_date=? WHERE pd_id=?");

$sql->bind_param("iissssssdsi",$pc_id,$pt_id,$pd_name,$pd_image1,$pd_image2,$pd_image3,$pd_image4,$pd_description,$pd_price,$pd_date,$pd_id);

if($sql->execute())
{
    echo "<script type='text/javascript'>
    alert('RECORD UPDATED');
    window.location='product_details_view.php';
    </script>";
}
else
{
    echo "<script type='text/javascript'>
    alert('NOT UPDATED');
    window.location='product_details_view.php';
    </script>";
}
}
?>








































<!--
<?php
include_once("../db_connection.php");
include_once("6_function.php");
$pc_id=$_POST['pc_id'];
$pt_id=$_POST['pt_id'];
$pd_name=$_POST['pd_name'];

$folder="photo/";

$pd_image1=$_FILES['pd_image1']['name'];

if(empty($pd_image1))
{
    $pd_image1=$_POST["old_pd_image1"];
}
else
{    
    $tmp_pd_image1=$_FILES['pd_image1']['tmp_name'];
    $pd_image1=upload_image($pd_image1,$tmp_pd_image1,$folder);
}
  
$pd_image2=$_FILES['pd_image2']['name']; 
if(empty($pd_image2))
{
    $pd_image2=$_POST["old_pd_image2"];
}
else
{
    $tmp_pd_image2=$_FILES['pd_image2']['tmp_name'];
    $pd_image2=upload_image($pd_image2,$tmp_pd_image2,$folder);
}
$pd_image3=$_FILES['pd_image3']['name'];
if(empty($pd_image3))
{
    $pd_image3=$_POST["old_pd_image3"];
}
else
{
$tmp_pd_image3=$_FILES['pd_image3']['tmp_name'];
$pd_image3=upload_image($pd_image3,$tmp_pd_image3,$folder);
}
$pd_image4=$_FILES['pd_image4']['name'];
if(empty($pd_image4))
{
    $pd_image4=$_POST["old_pd_image4"];
}
else
{
$tmp_pd_image4=$_FILES['pd_image4']['tmp_name'];
$pd_image4=upload_image($pd_image4,$tmp_pd_image4,$folder);
}
$pd_description=$_POST['pd_description'];
$pd_date=$_POST['pd_date'];

$sql1=$conn->prepare("SELECT * FROM product_details WHERE pc_id=? AND pt_id=? AND pd_name!=?");
$sql1->bind_param("iis",$pc_id,$pt_id,$pd_name);
$sql1->execute();
$result1=$sql1->get_result();
$count=$result1->num_rows;

if($count>0)
{
    echo "<script type='text/javascript'>
    alert('RECORD ALREADY EXIST');
    history.back();
    </script>";
}
 
else
{
$sql=$conn->prepare("UPDATE product_details SET pc_id=?,pt_id=?,pd_name=?,pd_image1=?,pd_image2=?,pd_image3=?,pd_image4=?,pd_description=?,pd_date=? WHERE pd_id=?");

$sql->bind_param("iisssssssi",$pc_id,$pt_id,$pd_name,$pd_image1,$pd_image2,$pd_image3,$pd_image4,$pd_description,$pd_date,$pd_id);

if($sql->execute())
{
    echo "<script type='text/javascript'>
    alert('RECORD INSERTED');
    window.location='product_details_view.php';
    </script>";
}
else
{
    echo "<script type='text/javascript'>
    alert('NOT INSERTED');
    window.location='product_details_view.php';
    </script>";
}
}
?>
-->





















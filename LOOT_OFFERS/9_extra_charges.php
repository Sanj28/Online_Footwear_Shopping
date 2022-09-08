<?php 
$sql_ec=$conn->prepare("SELECT * FROM extra_charges");
$sql_ec->execute();
$result_ec=$sql_ec->get_result();
$row_ec=$result_ec->fetch_assoc();
?>
<input type="hidden" id="ec_delivery_charges" value="<?php echo $row_ec["ec_delivery_charges"];?>">
<input type="hidden" id="ec_min_amount" value="<?php echo $row_ec["ec_min_amount"];?>">

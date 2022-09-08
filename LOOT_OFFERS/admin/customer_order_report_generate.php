<?php
require("../6_db_connection.php");
require('vendors/fpdf/mc_table.php');
require('8_convert_price.php');

$pdf=new PDF_MC_Table('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

$from_date=$_POST['from_date'];
$to_date=$_POST['to_date'];

$pdf->SetWidths(array(38,201,38));
$pdf->RowNoBorder(array('',"CUSTOMER INVOICE DETAILS BETWEEN ".date('d-m-Y', strtotime($from_date))." TO ".date('d-m-Y', strtotime($to_date)),''),8,'C');

$pdf->Ln(2);
$pdf->Cell(277 ,5,'','T',1);
$pdf->Ln(20);

$pdf->SetFont('Arial','B',14);
$pdf->SetWidths(array(20,34,30,53,50,30,30,30));
$pdf->RowBorder(array('SL NO.','DATE','ORDER NO','CUSTOMER NAME','PAYMENT MODE','SUB TOTAL','DELIVERY CHARGE','GRAND TOTAL'),8,'C');

$pdf->SetFont('Times','',12);

$sl=1;
$SQL = $conn->prepare("SELECT * FROM customer_order_details cod,customer c WHERE cod.cu_id=c.cu_id  AND cod.order_date BETWEEN ? AND ?");
$SQL->bind_param("ss",$from_date,$to_date);
$SQL->execute();
$slno=1;
$result=$SQL->get_result();
$grand_total=0;
if($result->num_rows > 0)
{	$pdf->SetWidths(array(20,34,30,53,50,30,30,30));
   while($row=$result->fetch_assoc())
    {       
        $json_array = json_decode($row["order_json"],true);   
        $date = date('d-m-Y', strtotime($row["order_date"]));
        //$grand_total=$grand_total+$row["total_price"];
        $grand_total=$grand_total+$json_array["amount_details"]["grand_total"];
       
       if($json_array["shipping_details"]["payment_mode"] == "COD")
         {
            $paymentmode=$json_array["shipping_details"]["payment_mode"];
         }
        else
        {
            $paymentmode=$json_array["shipping_details"]["payment_mode"]." ".$json_array["shipping_details"]["transaction_no"];
        }
	   
        $pdf->RowBorder(array($slno++,$date,$row["order_no"],$row["cu_name"]." \n".$row["cu_contact"],$paymentmode,currencyFormat($json_array["amount_details"]["total"]),currencyFormat($json_array["amount_details"]["delivery_charges"]),currencyFormat($json_array["amount_details"]["grand_total"])),8,'C');
    } 
    
    $pdf->SetWidths(array(247,30));
 	$pdf->RowBorder(array("TOTAL",currencyFormat($grand_total)),8,'C');
}
else
{
	$pdf->SetWidths(array(277));
    $pdf->RowBorder(array("NO RECORD FOUND"),8,'C');
}

$pdf->Output('COSTOMER INVOICE.pdf','I');
?>


<?php
	require("../6_db_connection.php");
	//call the FPDF library
	require('vendors/fpdf/mc_table.php');
	require('8_convert_price.php');
  
   $pdf=new PDF_MC_Table('P','mm','A4');
   $pdf->AddPage();

   $pdf->SetFont('Arial','B',18);

   $pdf->Cell(60 ,15,'',0,0);
   $image='vendors/logo.png'; //  logo
   $pdf->Cell(69,15,$pdf->Image($image,$pdf->GetX(),$pdf->GetY(),69,15),0,0,'C'); 
   $pdf->Cell(60 ,15,'',0,1);//end of line

   $pdf->Ln(4);

   $pdf->Cell(82 ,5,'',0,0);
   $pdf->Cell(25,5,'INVOICE','B',0,'C'); 
   $pdf->Cell(82 ,5,'',0,1);//end of line

   $pdf->Ln(10);

   $cod_id=$_REQUEST['cod_id'];
   $sql=$conn->prepare("SELECT * FROM customer_order_details cod,customer c WHERE c.cu_id=cod.cu_id AND cod.cod_id=?");    
   $sql->bind_param("i",$cod_id);
   $sql->execute();
   $result=$sql->get_result();
   $row=$result->fetch_assoc();
   $json_array = json_decode($row["order_json"],true);

   $pdf->SetFont('Arial','B',12);

   $pdf->SetWidths(array(189));
   $pdf->RowBorder(array('BILL TO'),8,'C');
   $pdf->SetFont('Arial','',12);
   $pdf->SetWidths(array(45,144));
   $pdf->RowBorder(array('NAME',$row["cu_name"]),8,'L');
   $pdf->RowBorder(array('SHIPPING ADDRESS',$json_array["shipping_details"]["shipping_address"]),8,'L');
   $pdf->RowBorder(array('LANDMARK',$json_array["shipping_details"]["landmark"]),8,'L');
   $pdf->RowBorder(array('CONTACT',$json_array["shipping_details"]["contact_no"]),8,'L');
   $pdf->RowBorder(array('PAYMENT MODE',$json_array["shipping_details"]["payment_mode"]),8,'L');
   $pdf->RowBorder(array('TRANSACTION NO',$json_array["shipping_details"]["transaction_no"]),8,'L');
  
 	$pdf->Ln(10);
	
	$pdf->SetFont('Arial','B',12);

   $pdf->Cell(14,10,'SL.NO',1,0,"C");    
   $pdf->Cell(50,10,'Product Name',1,0,"C");
   $pdf->Cell(20,10,'Price',1,0,"C");
   $pdf->Cell(25,10,'Discount',1,0,"C");
   $pdf->Cell(25,10,'Sub Total',1,0,"C");
   $pdf->Cell(20,10,'Tax',1,0,"C");
   $pdf->Cell(10,10,'Qty',1,0,"C");
   $pdf->Cell(25,10,'Amount',1,1,"C");

   $pdf->SetFont('Arial','',11);

   $pdf->SetWidths(array(14,50,20,25,25,20,10,25));

   $sl=0;
    foreach($json_array["product_details"] as $row) 
	{                               
	   $sl=$sl+1;
	   $pdf->RowBorder(array($sl,$row['name'],currencyFormat($row['price']),currencyFormat($row['discount_percent']),currencyFormat($row['sub_total']),currencyFormat($row['tax'])."%\n Rs.".currencyFormat($row['tax_amount']),$row['qty'],currencyFormat($row['totalamount'])),8,'C');
	}
   
   $pdf->Cell(164,10,'Total',1,0,"R");
   $pdf->Cell(25,10,currencyFormat($json_array["amount_details"]["total"]),1,1,"C");
	$pdf->Cell(164,10,'Delivery Charges',1,0,"R");
   $pdf->Cell(25,10,currencyFormat($json_array["amount_details"]["delivery_charges"]),1,1,"C");
$pdf->Cell(164,10,'Grand Total',1,0,"R");
   $pdf->Cell(25,10,currencyFormat($json_array["amount_details"]["grand_total"]),1,1,"C");
  

   $pdf->Output();
?>


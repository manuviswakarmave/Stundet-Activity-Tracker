<?php 
session_start();
require "connection.php";//connection to database
$item=$_SESSION['item'];

//SQL to get 10 records
$sql="select regid , fname , lname , dept , sem ,house from regarts where $item='yes'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);


require('fpdf.php');
$pdf = new FPDF(); 
$pdf->AddPage();
$pdf->Image('images/ccetlogo.jpg',10,10,-300);
$pdf->SetFont('Arial','B',10);
$pdf->Text(50,20,'CARMEL COLLEGE OF ENGINEERING AND TECHNOLOGY');
$pdf->Ln(20);
$pdf->SetFont('Arial','B',10);
$pdf->Text(70,30,"JHALAK - $item");
$pdf->Ln(20);
if($num > 0)
{
    $width_cell=array(30,30,30,30,30,30,);



    $pdf->SetFont('Arial','B',10);
    
    //Background color of header//
    $pdf->SetFillColor(193,229,252);
    
    // Header starts /// 
    //First header column //
    
    $pdf->Cell($width_cell[0],10,'ID',1,0,'C',true);
    //Second header column//
    $pdf->Cell($width_cell[1],10,'NAME',1,0,'C',true);
    //Third header column//
    $pdf->Cell($width_cell[2],10,'DEPT',1,0,'C',true); 
    //Fourth header column//
    $pdf->Cell($width_cell[3],10,'SEM',1,0,'C',true);
    //Third header column//
    $pdf->Cell($width_cell[4],10,'HOUSE',1,1,'C',true); 
    
    //// header ends ///////
    
    $pdf->SetFont('Arial','',14);
    //Background color of header//
    $pdf->SetFillColor(235,236,236); 
    //to give alternate background fill color to rows// 
    $fill=false;
    
    /// each record is one row  ///
    while($row = $result->fetch_assoc()){
    
    
    $pdf->Cell($width_cell[0],10,$row['regid'],1,0,'C',$fill);
    $pdf->Cell($width_cell[1],10,$row['fname']." ".$row['lname'],1,0,'L',$fill);
    $pdf->Cell($width_cell[2],10,$row['dept'],1,0,'C',$fill);
    $pdf->Cell($width_cell[3],10,$row['sem'],1,0,'C',$fill);
    $pdf->Cell($width_cell[4],10,$row['house'],1,1,'C',$fill);
    
    //to give alternate background fill  color to rows//
    $fill = !$fill;
    }
    /// end of records /// 
}
else
{
    $pdf->SetFont('Arial','B',10);
$pdf->Text(70,50,'No registrations made yet');
$pdf->Ln(20);
}


$pdf->Output();
?>
<?php
include('include/dbcon.php');
require 'fpdf/fpdf.php';
session_start();
$tr_id = $_GET['tr_id'];

// get heading of the test
$test_id =$_GET['test_id'];
$res = mysqli_query($connn,"select test_name from test where test_id =$test_id");
$tname = mysqli_fetch_assoc($res);
$heading=$tname['test_name'];

$pid =$_GET['pid'];
$res = mysqli_query($connn,"select * from profile where pid = $pid");
$pdtl = mysqli_fetch_assoc($res);
$name =$pdtl['name'];
$age =$pdtl['age'];

$print=$_SESSION['prints'];

$pdf = new FPDF();
$pdf -> AliasNbPages();
$pdf->AddPage('', 'A4', 0); //first parameter for landscape or portrait
//$pdf->Image('cross.png',0,0,10,6,);

//For Page Border

$pdf->SetLineWidth(2);
$pdf->SetDrawColor(4 ,130,94);
$width=$pdf->GetPageWidth(); // Width of Current Page
$height=$pdf->GetPageHeight(); // Height of Current Page
$gap=2; // Gap between line and border 
$pdf->Line($gap, $gap,$width-$gap,$gap); // Horizontal line at top
$pdf->Line($gap, $height-$gap,$width-$gap,$height-$gap); // Horizontal line at bottom
$pdf->Line($gap, $gap,$gap,$height-$gap); // Vetical line at left 
$pdf->Line($width-$gap, $gap,$width-$gap,$height-$gap); // Vetical line at Right

//End of Page Border

$pdf->SetFont('Arial','B',25);
$pdf->SetTextColor(199,25,235);
$pdf->Cell(0,5,strtoupper("patholab report from I&ct"),0,1,'C');

$pdf->SetFont('Arial','B',35);
$pdf->SetTextColor(69,216,253);
$pdf->Cell(0,18,strtoupper($heading." Test"),0,1,'C');

$pdf->SetTextColor(82,235,83);
$pdf-> SetFont('Times','', 18);
$pdf-> Cell(0, 5, 'A Healthy Outside Starts From Inside', 0, 1, 'C');
$pdf->SetLineWidth(1);
$pdf->SetDrawColor(0,59,93);
$pdf -> Line(5, 40, 206, 40);

$pdf->SetTextColor(144,123,145);
$pdf-> SetFont('Times','B', 12);
$pdf-> Cell(5, 20, "Transaction Id : $tr_id", 0, 0, '');
$pdf ->Ln(12);
$pdf-> Cell(5, 5, "Name : $name", 0, 0, '');
$pdf ->Ln(4);
$pdf-> Cell(5, 5, "Age : $age", 0, 0, '');

//------------------
//Table Heading of pdf
//--------------------
$pdf->SetTextColor(147,19,19);
$pdf->SetDrawColor(99,10,138);
$pdf->SetLineWidth(0);
$pdf ->Ln(8);
$pdf ->SetFont('Times','B',13);
$pdf ->Cell(65,10,'TEST NAME',1,0,'C');
$pdf ->Cell(30,10,'INPUT',1,0,'C');
$pdf ->Cell(52,10,'REFERENCE RANGE',1,0,'C');
$pdf ->Cell(40,10,'RESULT',1,0,'C');
$pdf ->Ln();

//Table Data 
$pdf->SetTextColor(0,0,0);
foreach($print as $d){
   $pdf ->SetFont('Times','',11);
   $pdf ->Cell(65,10,$d[1],1,0,'C');
   $pdf ->Cell(30,10,$d[2],1,0,'C');
   $pdf ->Cell(52,10,$d[3].' - '.$d[4],1,0,'C');
   
  // $pdf->SetTextColor(0,255,0);
   $pdf ->Cell(40,10,$d[5],1,0,'C');
  // $pdf->SetTextColor(0,0,0);
   
   $pdf ->Ln();

}


/*
   The Graph section is start from here
*/

//Positon
$chartX = 10;
$chartY = 170;

//Dimension
$chartWidth = 180;
$chartHeight = 115;

//Padding
$chartTopPadding = 10;
$chartLeftPadding = 15;
$chartBottomPadding = 15;
$chartRightPadding = 5;

//chart Box
$chartBoxX = $chartX + $chartLeftPadding;
$chartBoxY = $chartY + $chartTopPadding;

$chartBoxWidth=$chartWidth-$chartLeftPadding-$chartRightPadding;
$chartBoxHeight=$chartHeight-$chartBottomPadding-$chartTopPadding;

//bar width
$barWidth=15;
//chart data in line 5 $print[]
//For set maximum Value in $datamax Variable
$dataMax=0;
$dataMax1=0;
$dataMax2=0;
foreach($print as $item){
if($item[2]>$dataMax1)$dataMax1=$item[2];
if($item[4]>$dataMax2)$dataMax2=$item[4];
}

if($dataMax1>$dataMax2){
   $dataMax=$dataMax1;
}else
   $dataMax=$dataMax2;

$dataStep=10;

$pdf->SetFont('Arial','',9);
$pdf->SetLineWidth(0.2);
$pdf->SetDrawColor(0);
//chart boundary
$pdf->Rect($chartX,$chartY,$chartWidth,$chartHeight);


$pdf->Line(
   $chartBoxX ,
   $chartBoxY ,
   $chartBoxX ,
   ($chartBoxY+$chartBoxHeight)
   );
   //horizontal axis line
   $pdf->Line(
   $chartBoxX-0.5 ,
   ($chartBoxY+$chartBoxHeight) ,
   $chartBoxX+($chartBoxWidth) ,
   ($chartBoxY+$chartBoxHeight)
   );
   ///vertical axis
   //calculate chart's y axis scale unit
   $yAxisUnits=$chartBoxHeight/$dataMax;

   //draw the vertical (y) axis labels
for($i=0 ; $i<=$dataMax ; $i+=$dataStep){
   //y position
   $yAxisPos=$chartBoxY+($yAxisUnits*$i);
   //draw y axis line
   $pdf->Line(
   $chartBoxX-2 ,
   $yAxisPos ,
   $chartBoxX ,
   $yAxisPos
   );
   //set cell position for y axis labels
   $pdf->SetXY($chartBoxX-$chartLeftPadding , $yAxisPos-2);
   //$pdf->Cell($chartLeftPadding-4 , 5 , $dataMax-$i , 1);------
   //---------
   $pdf->Cell($chartLeftPadding-4 , 5 , $dataMax-$i, 0 , 0 ,'R');
   }

   $pdf->SetXY($chartBoxX , $chartBoxY+$chartBoxHeight);
//cell's width
$xLabelWidth=$chartBoxWidth / count($print);
//$pdf->Cell($xLabelWidth , 5 , $itemName , 1 , 0 , 'C');-------------
//loop horizontal axis and draw the bar
$barXPos=0;
$r=$g=$b=0;
foreach($print as $item){
//print the label
$pdf->SetFont('Arial','',7);
$pdf->Cell($xLabelWidth , 5 , $item[1] , 0 , 0 , 'C');
if($item[6]==1){
   $r=0;
   $g=255;
   $b=0;
}else if($item[6]==2){
   $r=255;
   $g=0;
   $b=0;
}else if($item[6]==0){
   $r=218;
   $g=176;
   $b=250;
}
$pdf->SetFillColor($r,$g,$b);
$barHeight=$yAxisUnits*$item[2];
//bar x position
$barX=($xLabelWidth/2)+($xLabelWidth*$barXPos);
$barX=$barX-($barWidth/2);
$barX=$barX+$chartBoxX;
//bar y position
$barY=$chartBoxHeight-$barHeight;
$barY=$barY+$chartBoxY;
//draw the bar
$pdf->Rect($barX,$barY,$barWidth,$barHeight,'DF');
//increase x position (next series)
$barXPos++;
}

$pdf->SetFont('Arial','B',12);
$pdf->SetXY($chartX,$chartY);
$pdf->Cell(100,10,"UNITS",0);
$pdf->SetXY(($chartWidth/2)-50+$chartX,$chartY+$chartHeight-
($chartBottomPadding/2));
$pdf->Cell(100,-1,"TEST NAMES",0,0,'C');


$file=str_replace(' ','_',$heading."_Test".time().".pdf");
//$pdf->Output($file,'D');
$pdf->Output();

?>

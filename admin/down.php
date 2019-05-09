<?php
include "dbcon.php";//require "config.php"; // connection to database 


if(!file_exists('fpdf.php')){
	
echo " Place fpdf.php file in this directory before using this page. ";
exit;	
}

if(!file_exists('font')){
	echo " Place font directory in this directory before using this page. ";
exit;	
}

 if (isset($_POST['class']) && isset($_POST['facid']))
			{
			$facid = $_POST["facid"];
			$cls = $_POST["class"];
			$facname=$_POST["facname"];
				$query = "SELECT * FROM `feedback`.`setup`";
                $result = mysqli_query($conn,$query);
				$col=mysqli_fetch_array($result);
			
$ct=1;
$title="Feedback of ".$facname." ".$col["Session"];
require'fpdf.php';
$pdf = new FPDF(); 
$pdf->AddPage('L','A4');
$pdf->SetAuthor($col["college"]);
$pdf->SetTitle($title);

$pdf->SetFont('Arial','B',12);
$pdf->Cell( 0, 10, $col["college"]." - Dept. of ".$col["department"], 0, 1, 'C' );
$pdf->Cell( 0, 10, "Faculty Feedback Report for ".$cls, 0, 1, 'C' );
$pdf->Cell( 0, 10, "Faculty Name: ".$facname, 0, 0, 'L' );
$pdf->Cell( 0, 10, "Session: ".$col["Session"], 0, 1, 'R' );

$width_cell=array(12,15,35,35,35,35,35,35,35,35);
$pdf->SetFont('Arial','B',10);

$pdf->SetFillColor(255,255,255); // Background color of header 
// Header starts 

$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[2],10,'Punctuality in taking classes/ Labs',1,2,'C',true); // Fourth header column
$pdf->SetXY($x+$width_cell[2],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[3],10,'Deep Knowledge of Subject & its trends',1,2,'C',true); // Third header column
$pdf->SetXY($x+$width_cell[3],$y);
$x = $pdf->GetX();
$y = $pdf->GetY();  
$pdf->MultiCell($width_cell[4],10,'Clear ORAL communi- cation, asking questions',1,2,'C',true); // First header column 
$pdf->SetXY($x+$width_cell[4],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[5],7.5,'Proper use of Chalkboard /OHP /PPT /Models /Charts',1,2,'C',true); // Second header column
$pdf->SetXY($x+$width_cell[5],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[6],6,'Appropriate Teaching Speed, loudness, & matching body language',1,2,'C',true); // Third header column
$pdf->SetXY($x+$width_cell[6],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[7],6,'Derivations, Tutorial Sheets/ Problem Solving/ Case studies/ Class seminars',1,2,'C',true); // Fourth header column
$pdf->SetXY($x+$width_cell[7],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[8],5,'Guidance in Tutorials/ Labs/ Assignments/ Demonstrations/ Papers solving/ Project Work',1,2,'C',true); // Third header column 
$pdf->SetXY($x+$width_cell[8],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[9],10,'Home/ Library assignments forself-learning',1,2,'C',true); // Third header column 


// end of header
//$facid=2;
$pdf->SetFont('Arial','',9);
$query = "SELECT * FROM `feedback`.`subjects` WHERE subid='$facid'";
                $result = mysqli_query($conn,$query);
				 $row = mysqli_fetch_array($result);
	$query = "SELECT * FROM `feedback`.`marks` WHERE facid='$facid'";
                $result = mysqli_query($conn,$query);
				
// for datas
while($rows = $result->fetch_array()) {

$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[2],7.5,$rows["q1"],1,2,'C',true); // Fourth header column
$pdf->SetXY($x+$width_cell[2],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[3],7.5,$rows["q2"],1,2,'C',true); // Third header column
$pdf->SetXY($x+$width_cell[3],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[4],7.5,$rows["q3"],1,2,'C',true); // First header column 
$pdf->SetXY($x+$width_cell[4],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[5],7.5,$rows["q4"],1,2,'C',true); // Second header column
$pdf->SetXY($x+$width_cell[5],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[6],7.5,$rows["q5"],1,2,'C',true); // Third header column
$pdf->SetXY($x+$width_cell[6],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[7],7.5,$rows["q6"],1,2,'C',true); // Fourth header column
$pdf->SetXY($x+$width_cell[7],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[8],7.5,$rows["q7"],1,2,'C',true); // Third header column 
$pdf->SetXY($x+$width_cell[8],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[9],7.5,$rows["q8"],1,1,'C',true); // Third header column 
			
				}
				
/// end of records /// 
}
$date =  date("F j, Y");
$pdf->SetY(2);
    //Arial italic 8
    $pdf->SetFont('Arial','I',8);
    //Page number
	 $pdf->Cell(0,5,'Date: '.Date("F j, Y"),0,'L');
    $pdf->Cell(0,5,'Page: '.$pdf->PageNo(),0,0,'R');
   
$pdf->Output();

?>
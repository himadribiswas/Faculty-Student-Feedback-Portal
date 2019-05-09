<?php
include "dbcon.php";

$ct=1;

//	$cls= "1st Year Section A";
	//echo $cls;

 if (isset($_POST['cls']))
			{
			$cls = $_POST["cls"];

				$query = "SELECT * FROM `feedback`.`setup`";
                $result = mysqli_query($conn,$query);
				$col=mysqli_fetch_array($result);
			
$ct=1;
$title="Feedback of ".$col["Session"];
require'fpdf.php';
$pdf = new FPDF(); 
$pdf->AddPage('L','A4');
$pdf->SetAuthor($col["college"]);
$pdf->SetTitle($title);

$pdf->SetFont('Arial','B',12);
$pdf->Cell( 0, 10, $col["college"]." - Dept. of ".$col["department"], 0, 1, 'C' );
$pdf->Cell( 0, 10, "Faculty Feedback Report for ".$cls, 0, 1, 'C' );
$pdf->Cell( 0, 10, "Session: ".$col["Session"], 0, 1, 'R' );
		
	



if(!file_exists('fpdf.php')){
	
echo " Place fpdf.php file in this directory before using this page. ";
exit;	
}

if(!file_exists('font')){
	echo " Place font directory in this directory before using this page. ";
exit;	
}

$width_cell=array(12,15,22,30,30,30,30,30,30,30,16);
$pdf->SetFont('Arial','B',10);

$pdf->SetFillColor(255,255,255); // Background color of header 
// Header starts /// 
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell($width_cell[0],15,'Paper Code',1,2,'C',true); // Second header column
$pdf->SetXY($x+$width_cell[0],$y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell($width_cell[1],15,'Faculty Name',1,2,'C',true); // Third header column
$pdf->SetXY($x+$width_cell[1],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[2],7.5,'Punctuality in taking classes/ Labs',1,2,'C',true); // Fourth header column
$pdf->SetXY($x+$width_cell[2],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[3],7.5,'Deep Knowledge of Subject & its trends',1,2,'C',true); // Third header column
$pdf->SetXY($x+$width_cell[3],$y);
$x = $pdf->GetX();
$y = $pdf->GetY();  
$pdf->MultiCell($width_cell[4],7.5,'Clear ORAL communi- cation, asking questions',1,2,'C',true); // First header column 
$pdf->SetXY($x+$width_cell[4],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[5],7.5,'Proper use of Chalkboard /OHP /PPT /Models /Charts',1,2,'C',true); // Second header column
$pdf->SetXY($x+$width_cell[5],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[6],5,'Appropriate Teaching Speed, loudness, & matching body language',1,2,'C',true); // Third header column
$pdf->SetXY($x+$width_cell[6],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[7],5,'Derivations, Tutorial Sheets/ Problem Solving/ Case studies/ Class seminars',1,2,'C',true); // Fourth header column
$pdf->SetXY($x+$width_cell[7],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[8],5,'Guidance in Tutorials/ Labs/ Assignments/ Demonstrations/ Papers solving/ Project Work',1,2,'C',true); // Third header column 
$pdf->SetXY($x+$width_cell[8],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[9],10,'Home/ Library assignments forself-learning',1,2,'C',true); // Third header column 
$pdf->SetXY($x+$width_cell[9],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[10],15,'Total Score',1,1,'C',true); 
// end of header

$pdf->SetFont('Arial','',9);
$query = "SELECT * FROM `feedback`.`subjects` WHERE class='$cls'";
                $resultt = mysqli_query($conn,$query);
				if(mysqli_num_rows($resultt)!=0)
				{

				 while($roww = $resultt->fetch_array())
				 {
					 $sub=$roww["subid"];
					 $query1 = "SELECT COUNT(q1) AS total_students FROM `feedback`.`marks` WHERE facid='$sub'";
				$result1 = mysqli_query($conn,$query1);
				$r1 = mysqli_fetch_assoc($result1); 
				$count = $r1['total_students'];
				if($count!=0)
				{
					 
				
				$query = "SELECT SUM(q1) AS q1_sum FROM `feedback`.`marks` WHERE facid='$sub'";
				$result = mysqli_query($conn,$query);
				$r = mysqli_fetch_assoc($result); 
				$q1sum = $r['q1_sum'];

				
				$query = "SELECT SUM(q2) AS q2_sum FROM `feedback`.`marks` WHERE facid='$sub'";
				$result = mysqli_query($conn,$query);
				$r = mysqli_fetch_assoc($result); 
				$q2sum = $r['q2_sum'];
				$query = "SELECT SUM(q3) AS q3_sum FROM `feedback`.`marks` WHERE facid='$sub'";
				$result = mysqli_query($conn,$query);
				$r = mysqli_fetch_assoc($result); 
				$q3sum = $r['q3_sum'];
				$query = "SELECT SUM(q4) AS q4_sum FROM `feedback`.`marks` WHERE facid='$sub'";
				$result = mysqli_query($conn,$query);
				$r = mysqli_fetch_assoc($result); 
				$q4sum = $r['q4_sum'];
				$query = "SELECT SUM(q5) AS q5_sum FROM `feedback`.`marks` WHERE facid='$sub'";
				$result = mysqli_query($conn,$query);
				$r = mysqli_fetch_assoc($result); 
				$q5sum = $r['q5_sum'];
				$query = "SELECT SUM(q6) AS q6_sum FROM `feedback`.`marks` WHERE facid='$sub'";
				$result = mysqli_query($conn,$query);
				$r = mysqli_fetch_assoc($result); 
				$q6sum = $r['q6_sum'];
				$query = "SELECT SUM(q7) AS q7_sum FROM `feedback`.`marks` WHERE facid='$sub'";
				$result = mysqli_query($conn,$query);
				$r = mysqli_fetch_assoc($result); 
				$q7sum = $r['q7_sum'];
				$query = "SELECT SUM(q8) AS q8_sum FROM `feedback`.`marks` WHERE facid='$sub'";
				$result = mysqli_query($conn,$query);
				$r = mysqli_fetch_assoc($result); 
				$q8sum = $r['q8_sum'];
				
// for datas
$qt1=0;$qt2=0;$qt3=0;$qt4=0;$qt5=0;$qt6=0;$qt7=0;$qt8=0;
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell($width_cell[0],15,$roww["subjectcode"],1,2,'C',true); // Second header column
$pdf->SetXY($x+$width_cell[0],$y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell($width_cell[1],7.5,$roww["faculty"],1,2,'C',true); // Third header column;
$pdf->SetXY($x+$width_cell[1],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[2],15,round($q1sum/$count),1,2,'C',true); // Fourth header column
$pdf->SetXY($x+$width_cell[2],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$qt1=$qt1+($q1sum/$count);
$pdf->MultiCell($width_cell[3],15,round($q2sum/$count),1,2,'C',true); // Third header column
$pdf->SetXY($x+$width_cell[3],$y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$qt2=$qt2+($q2sum/$count);  
$pdf->MultiCell($width_cell[4],15,round($q3sum/$count),1,2,'C',true); // First header column 
$pdf->SetXY($x+$width_cell[4],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$qt3=$qt3+($q3sum/$count);
$pdf->MultiCell($width_cell[5],15,round($q4sum/$count),1,2,'C',true); // Second header column
$pdf->SetXY($x+$width_cell[5],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$qt4=$qt4+($q4sum/$count);
$pdf->MultiCell($width_cell[6],15,round($q5sum/$count),1,2,'C',true); // Third header column
$pdf->SetXY($x+$width_cell[6],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$qt5=$qt5+($q5sum/$count);
$pdf->MultiCell($width_cell[7],15,round($q6sum/$count),1,2,'C',true); // Fourth header column
$pdf->SetXY($x+$width_cell[7],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$qt6=$qt6+($q6sum/$count);
$pdf->MultiCell($width_cell[8],15,round($q7sum/$count),1,2,'C',true); // Third header column 
$pdf->SetXY($x+$width_cell[8],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$qt7=$qt7+($q7sum/$count);
$pdf->MultiCell($width_cell[9],15,round($q8sum/$count),1,2,'C',true); // Third header column 
$pdf->SetXY($x+$width_cell[9],$y);
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$qt8=$qt8+($q8sum/$count);
$t=round(($qt1+$qt2+$qt3+$qt4+$qt5+$qt6+$qt7+$qt8)/8);
$pdf->MultiCell($width_cell[10],15,$t,1,2,'C',true); 
				
				}
				 }
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
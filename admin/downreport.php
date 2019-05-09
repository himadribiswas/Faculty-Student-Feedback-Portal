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
//echo $_POST["fname"];
 if (isset($_POST["fname"]) )
			{

			$facname=$_POST["fname"];
			$fname=$_POST["fname"];
			//echo $fname;
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
$pdf->Cell( 0, 10, "Faculty Feedback Report", 0, 1, 'C' );
$pdf->Cell( 0, 10, "Faculty Name: ".$facname, 0, 0, 'L' );
$pdf->Cell( 0, 10, "Session: ".$col["Session"], 0, 1, 'R' );

$width_cell=array(12,15,22,30,30,30,30,30,30,30,16);
$pdf->SetFont('Arial','B',10);

$pdf->SetFillColor(255,255,255); // Background color of header 
// Header starts 

$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell($width_cell[0],15,'Paper Code',1,2,'C',true); // Second header column
$pdf->SetXY($x+$width_cell[0],$y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell($width_cell[1],30,'Class',1,2,'C',true); // Third header column
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
$pdf->MultiCell($width_cell[10],15,'Total Score',1,2,'C',true); 


// end of header
//$facid=2;
$pdf->SetFont('Arial','',9);
$total=0;$c=0;$qtt1=0;$qtt2=0;$qtt3=0;$qtt4=0;$qtt5=0;$qtt6=0;$qtt7=0;$qtt8=0;
                $query1 = "SELECT * FROM `feedback`.`subjects` WHERE faculty='$fname'";
                $result1 = mysqli_query($conn,$query1);
				//$row1=mysqli_fetch_array($result1);
		while($row = $result1->fetch_array()) {
			    $fid=$row["subid"];
				
				$query2 = "SELECT COUNT(q1) AS total_students FROM `feedback`.`marks` WHERE facid='$fid'";
				$result2 = mysqli_query($conn,$query2);
				$r1 = mysqli_fetch_assoc($result2); 
				$count = $r1['total_students'];
				if($count!=0)
				{
				
				$query = "SELECT SUM(q1) AS q1_sum FROM `feedback`.`marks` WHERE facid='$fid'";
				$result = mysqli_query($conn,$query);
				$r = mysqli_fetch_assoc($result); 
				$q1sum = $r['q1_sum'];
				$query = "SELECT SUM(q2) AS q2_sum FROM `feedback`.`marks` WHERE facid='$fid'";
				$result = mysqli_query($conn,$query);
				$r = mysqli_fetch_assoc($result); 
				$q2sum = $r['q2_sum'];
				$query = "SELECT SUM(q3) AS q3_sum FROM `feedback`.`marks` WHERE facid='$fid'";
				$result = mysqli_query($conn,$query);
				$r = mysqli_fetch_assoc($result); 
				$q3sum = $r['q3_sum'];
				$query = "SELECT SUM(q4) AS q4_sum FROM `feedback`.`marks` WHERE facid='$fid'";
				$result = mysqli_query($conn,$query);
				$r = mysqli_fetch_assoc($result); 
				$q4sum = $r['q4_sum'];
				$query = "SELECT SUM(q5) AS q5_sum FROM `feedback`.`marks` WHERE facid='$fid'";
				$result = mysqli_query($conn,$query);
				$r = mysqli_fetch_assoc($result); 
				$q5sum = $r['q5_sum'];
				$query = "SELECT SUM(q6) AS q6_sum FROM `feedback`.`marks` WHERE facid='$fid'";
				$result = mysqli_query($conn,$query);
				$r = mysqli_fetch_assoc($result); 
				$q6sum = $r['q6_sum'];
				$query = "SELECT SUM(q7) AS q7_sum FROM `feedback`.`marks` WHERE facid='$fid'";
				$result = mysqli_query($conn,$query);
				$r = mysqli_fetch_assoc($result); 
				$q7sum = $r['q7_sum'];
				$query = "SELECT SUM(q8) AS q8_sum FROM `feedback`.`marks` WHERE facid='$fid'";
				$result = mysqli_query($conn,$query);
				$r = mysqli_fetch_assoc($result); 
				$q8sum = $r['q8_sum'];
				
$qt1=0;$qt2=0;$qt3=0;$qt4=0;$qt5=0;$qt6=0;$qt7=0;$qt8=0;


$pdf->SetFillColor(255,255,255); // Background color of header 

$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell($width_cell[0],18,$row["subjectcode"],1,2,'C',true); // Second header column
$pdf->SetXY($x+$width_cell[0],$y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell($width_cell[1],6,$row["class"],1,2,'C',true); // Third header column
$pdf->SetXY($x+$width_cell[1],$y);

$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[2],18,round($q1sum/$count),1,2,'C',true); // Fourth header column
$pdf->SetXY($x+$width_cell[2],$y);
$qt1=$qt1+($q1sum/$count);
		$qtt1=$qtt1+$qt1;
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[3],18,round($q2sum/$count),1,2,'C',true); // Third header column
$pdf->SetXY($x+$width_cell[3],$y);
$qt2=$qt2+($q2sum/$count);
		$qtt2=$qtt2+$qt2;
$x = $pdf->GetX();
$y = $pdf->GetY();  
$pdf->MultiCell($width_cell[4],18,round($q3sum/$count),1,2,'C',true); // First header column 
$pdf->SetXY($x+$width_cell[4],$y);
$qt3=$qt3+($q3sum/$count);
		$qtt3=$qtt3+$qt3;
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[5],18,round($q4sum/$count),1,2,'C',true); // Second header column
$pdf->SetXY($x+$width_cell[5],$y);
$qt4=$qt4+($q4sum/$count);
		$qtt4=$qtt4+$qt4;
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[6],18,round($q5sum/$count),1,2,'C',true); // Third header column
$pdf->SetXY($x+$width_cell[6],$y);
$qt5=$qt5+($q5sum/$count);
		$qtt5=$qtt5+$qt5;
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[7],18,round($q6sum/$count),1,2,'C',true); // Fourth header column
$pdf->SetXY($x+$width_cell[7],$y);
$qt6=$qt6+($q6sum/$count);
		$qtt6=$qtt6+$qt6;
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[8],18,round($q7sum/$count),1,2,'C',true); // Third header column 
$pdf->SetXY($x+$width_cell[8],$y);
$qt7=$qt7+($q7sum/$count);
		$qtt7=$qtt7+$qt7;
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[9],18,round($q8sum/$count),1,2,'C',true); // Third header column 
$pdf->SetXY($x+$width_cell[9],$y);
$qt8=$qt8+($q8sum/$count);
		$qtt8=$qtt8+$qt8;
		$t=round(($qt1+$qt2+$qt3+$qt4+$qt5+$qt6+$qt7+$qt8)/8);
		$total=$total+$t;$c++;
$x = $pdf->GetX();
$y = $pdf->GetY(); 
$pdf->MultiCell($width_cell[10],18,$t,1,2,'C',true);				
/// end of records /// 
}
		}
	if($count!=0)
	{
$pdf->SetFont('Arial','B',12);
$pdf->Cell($width_cell[0]+$width_cell[1],18,'Total Score',1,0,'C');			
$pdf->Cell($width_cell[2],18,round($qtt1/$c),1,0,'C');	
$pdf->Cell($width_cell[3],18,round($qtt2/$c),1,0,'C');	
$pdf->Cell($width_cell[4],18,round($qtt3/$c),1,0,'C');	
$pdf->Cell($width_cell[5],18,round($qtt4/$c),1,0,'C');	
$pdf->Cell($width_cell[6],18,round($qtt5/$c),1,0,'C');	
$pdf->Cell($width_cell[7],18,round($qtt6/$c),1,0,'C');	
$pdf->Cell($width_cell[8],18,round($qtt7/$c),1,0,'C');	
$pdf->Cell($width_cell[9],18,round($qtt8/$c),1,0,'C');	
$pdf->Cell($width_cell[10],18,round($total/$c),1,1,'C');
	}				
$date =  date("F j, Y");
$pdf->SetY(2);
    //Arial italic 8
    $pdf->SetFont('Arial','I',8);
    //Page number
	 $pdf->Cell(0,5,'Date: '.Date("F j, Y"),0,'L');
    $pdf->Cell(0,5,'Page: '.$pdf->PageNo(),0,0,'R');
			}
$pdf->Output();

?>
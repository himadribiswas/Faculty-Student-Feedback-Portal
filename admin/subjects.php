<?php
include "dbcon.php";

if (isset($_POST['sub_code']))
			{
				
				$sub_code = $_POST['sub_code'];
				$sub_name = $_POST['sub_name'];
				$fac_name = $_POST['fac_name'];
				$class = $_POST['class'];
				

				
				
				
				 $query = "INSERT INTO `feedback`.`subjects` (`subjectcode`, `subjectname`, `faculty`, `class`) VALUES ('$sub_code', '$sub_name', '$fac_name', '$class');";
        $result = mysqli_query($conn,$query);	   
			
			if($class =="1st Year Section A" || $class =="1st Year Section B")
					header('Location: faculty_disp.php?year=1st Year');
				if($class =="2nd Year Section A" || $class =="2nd Year Section B")
					header('Location: faculty_disp.php?year=2nd Year');
				if($class =="3rd Year Section A" || $class =="3rd Year Section B")
					header('Location: faculty_disp.php?year=3rd Year');
				if($class =="4th Year Section A" || $class =="4th Year Section B")
					header('Location: faculty_disp.php?year=4th Year');
			}
?>
<?php
include "dbcon.php";
    $cls=$_GET["cls"];
	echo $cls;
    $query = "DELETE FROM `feedback`.`subjects` WHERE subid = " . $_GET["id"];
    $result = mysqli_query($conn, $query);
	if($cls=="1st Year")
	header('Location: faculty_disp.php?year=1st Year');
	if($cls=="2nd Year")
	header('Location: faculty_disp.php?year=2nd Year');
	if($cls=="3rd Year")
	header('Location: faculty_disp.php?year=3rd Year');
	if($cls=="4th Year")
	header('Location: faculty_disp.php?year=4th Year');

?>
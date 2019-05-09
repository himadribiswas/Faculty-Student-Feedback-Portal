<?php
include "dbcon.php";
$k=$_GET["id"];
     $query = "DELETE FROM `feedback`.`faculty` WHERE facultyname='$k'";
    $result = mysqli_query($conn, $query);
    // Check the result and post confirm message
	if($result)
	 header('Location: add_faculty.php?del=del');

	Delete

?>
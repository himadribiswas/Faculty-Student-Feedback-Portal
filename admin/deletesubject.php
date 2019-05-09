<?php
include "dbcon.php";
$k=$_GET["id"];
     $query = "DELETE FROM `feedback`.`paper` WHERE papername='$k'";
    $result = mysqli_query($conn, $query);
    // Check the result and post confirm message
	if($result)
	 header('Location: add_subject.php?del=del');

	Delete

?>
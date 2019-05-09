<!DOCTYPE html>

<?php
include "dbcon.php";
$query = "SELECT * FROM `feedback`.`setup`";
        $result = mysqli_query($conn,$query);

		$row = mysqli_fetch_array($result);
        if(!$result)
			header("location:admin/index.php");
?>

<div class="container-fluid">
  
  <div class="row">
    <div class="col-lg-12" style="background-color:lavender;"> <center> <h3>DEPARTMENT OF <?php echo $row["department"]; ?></h3>      
  <h5 class="text-uppercase"><?php echo $row["college"]; ?></h5> 
  <h4 class="text-uppercase">Session: <?php echo $row["Session"]; ?></h4> </center>     
   </div>
  </div>
  <div class="row">
    <div class="col-lg-12" style="background-color:lavender;"> <center> <h2><kbd>Faculty-Student Feedback Portal</kbd></h2>      
  </div>
</div>
</div>


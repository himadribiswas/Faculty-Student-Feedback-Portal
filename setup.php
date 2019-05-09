<?php
include "dbcon.php";

 $query = "CREATE TABLE IF NOT EXISTS `feedback`.`setup` ( `collgid` INT(5) AUTO_INCREMENT , `college` VARCHAR(255) NOT NULL , `department` VARCHAR(255) NOT NULL , `Session` VARCHAR(255) NOT NULL , PRIMARY KEY (`collgid`))";
       $result = mysqli_query($conn,$query);


if (isset($_POST['collg_name']) && isset($_POST['dept']))
			{
				
				$collg_name = $_POST['collg_name'];
				$dept = $_POST['dept'];
				$academic_session = $_POST['academic_session'];
				
			}
			echo $dept;
        $query = "INSERT INTO `feedback`.`setup` (`college`, `department`, `Session`) VALUES ('$collg_name', '$dept', '$academic_session');";
		         // INSERT INTO `setup` (`college`, `department`, `Session`) VALUES ('cse', 'fdf', 'hv');
		
        $result = mysqli_query($conn,$query);	   
	   
?>
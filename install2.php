
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Faculty-Student Feedback Portal Installation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="css/jquery-2.2.3.min.js"></script>
  <script src="css/bootstrap.min.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="css/logo.png" />
  
  <SCRIPT type="text/javascript">
//window.history.forward();
//function noBack() { window.history.forward(); } 
function validateform(){  
var name=document.registerform.user.value;  
var password=document.registerform.password.value; 
var cpassword=document.registerform.confirmpassword.value; 

  
if (name==null || name==""){  
  alert("Name can't be blank");  
  return false;  
}else if(password.length<8){  
  alert("Password must be at least 8 characters long.");  
  return false;  
  }  
  else if(password != cpassword){  
  alert("Pasword Didnot match!");  
  
  
  return false;  
  }  
} 
</SCRIPT>
</head>
<body>
<div class="container-fluid">
  
  <div class="row">
    <div class="col-lg-12" style="background-color:lavender;"> <center> <h1>Faculty-Student Feedback Portal Installation</h1>      
  <p>Installation in progress..</p> </center>        
  </div>
   
  </div>
</div>
 <div class="container">
   <div class="panel panel-primary col-md-6 col-md-offset-3">
     <div class="panel-heading ">
   <h3>Register New Admin User</h3>      
	</div>
	<div class="panel-body">
						
							<div class="">
								
								<form id="register-form" name="registerform" action="admin/newuser.php" method="post" role="form" onsubmit="return validateform()">
									<div class="form-group">
										<input type="text" name="user" id="user" tabindex="1" class="form-control" placeholder="Username" value="" required>
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="" required>
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
									</div>
									<div class="form-group">
										<input type="password" name="confirmpassword" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" required>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-4 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-primary" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					</div>
 <div class="footer navbar-fixed-bottom navbar-inverse">
  <center> <font color="white">    <p class="text-uppercase"> © 2018. All Rights Reserved. &nbsp;|&nbsp; Faculty-Student Feedback Portal. &nbsp;|&nbsp; Developed by Himadri Biswas [RCCIIT ECE 2014-2018]</p></font </center>
    </div>
</body>
</html>	
		
	   

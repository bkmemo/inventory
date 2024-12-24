<?php

	include_once "connect.php"; 
	error_reporting(0);
	error_reporting (E_ALL ^ E_NOTICE);
	$con = db_connect();
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
//end of function


include ("../pages/header.php");?>
<body>        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div></nav>
    <div class="container" style="background-image:url(../images/mobileshop1.jpg);">
        <div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">                     
		<div class="panel panel-info" >
			<div class="panel-heading">
				<div class="panel-title">Enter OTP</div>                        
			</div> 
			<div style="padding-top:30px" class="panel-body" >
				<?php if ($errorMessage != '') { ?>
					<div id="login-alert" class="alert alert-danger col-sm-12"><?php echo $errorMessage; ?></div>                            
				<?php } ?>
				<form id="authenticateform" class="form-horizontal" role="form" method="POST" action="save_verify.php">  					
					<div style="margin-bottom: 25px" class="input-group">
						<label class="text-success">Check your email for OTP</label>
						<input type="text" class="form-control" id="otp" name="otp" placeholder="One Time Password">                       
					</div>                          
					<div style="margin-top:10px" class="form-group">                               
						<div class="col-sm-12 controls">
						  <input type="submit" name="authenticate" value="Submit" class="btn btn-success">						  
						</div>
					</div>                                
				</form>   
			</div>                     
		</div>  
		</div>  
	</div><div class="col-md-4"></div>
       </div>
		<br><br><br><br><br><br><br>
    </div>

<?php   include ("../pages/footer.php");?>



  


  
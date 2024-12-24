<?php include("inc/header.php");?>
<title>webdamn.com : Demo Login System with OTP using PHP & MySQL</title>
<?php include('inc/container.php');?>
<div class="container">	
	<div class="col-md-12">   
	<h2>Example: Login System with OTP using PHP & MySQL</h2>	
	</div>
	<div class="col-md-6">                    
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
</div>	
<?php include('inc/footer.php');?>




  
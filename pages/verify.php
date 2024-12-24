<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include("connect.php"); 
	$con = db_connect();
	$errorMessage ='';
if(isset($_POST["authenticate"])){
	$opt = $_POST["otp"];
	date_default_timezone_set('Africa/Kampala');
	$today = date( 'Y-m-d H:i:s' );
	$sqlQuery = "SELECT * FROM authentication WHERE otp='$opt' AND expired!=1 AND '$today' <= DATE_ADD(created, INTERVAL 1 HOUR)";
	$result = mysqli_query($con, $sqlQuery);
	$count = mysqli_num_rows($result);
	if(!empty($count)) {
		$sqlUpdate = "UPDATE authentication SET expired = 1 WHERE otp = '" . $_POST["otp"] . "'";
		$result = mysqli_query($con, $sqlUpdate);
		header("Location:index.php");
	} else {
		$errorMessage = "Invalid OTP!";
	}	
} else if(!empty($_POST["otp"])){
	$errorMessage = "Enter OTP!";	
}	
?>

<?php   include ("../pages/header.php");?>
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
		<br><br><br><br><br><br><br><br><br><br>
					<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-primary" >
					<div class="panel-heading">
						<div class="panel-title"><center>Enter OTP<center></div>                        
					</div> 
					<div style="padding-top:30px" class="panel-body" >
						<?php if ($errorMessage != '') { ?>
							<div id="login-alert" class="alert alert-danger col-sm-12"><?php echo $errorMessage; ?></div>                            
						<?php } ?>
						<form id="authenticateform" class="form-horizontal" role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">  					
							<div style="margin-bottom: 25px" class="input-group">
								<label class="text-success">Check your Phone Number for OTP</label>
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
		<br><br><br><br><br><br><br>
    </div>

<?php   include ("../pages/footer.php");?>


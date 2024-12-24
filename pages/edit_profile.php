<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
	error_reporting(0);
	include_once 'log.php';
	error_reporting (E_ALL ^ E_NOTICE);
	$con = db_connect();
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}		
	if(!isset($_POST['save_edit_profile'])){
		$query="select * from profile where profile_id=1";
		$query_run=mysqli_query($con,$query);
	if($_GET=mysqli_fetch_array($query_run)){}}
?>
<?php   include ("../pages/header.php");?> 
<body>
    <div id="wrapper">
<?php   include ("../pages/side.php");?>
        <div id="page-wrapper">
		<div class="row">
		<div class="panel panel-primary">
				  <div class="panel-heading"><h4>Edit Profile</h4> </div>
				  <div class="panel-body">
                <form method="post" action="save_edit_profile.php" role="form" enctype="multipart/form-data">
				<div class="row">
							<div class="col-md-4">
							 Business Name:
							 <div class="form-group"> 
								<input type="text"  name="business_name" placeholder="Enter Business Name"  value="<?php echo $_GET['business_name']; ?>" required="required" class="form-control" />
							 </div> 
							 </div> <div class="col-md-4">
							 
							Business Slogan:
							 <div class="form-group"> 
								<input type="text"  name="business_slogan" placeholder="Enter Business Slogan"  value="<?php echo $_GET['business_slogan']; ?>" required="required" class="form-control" />
							 </div> 
							  </div> <div class="col-md-4">
							Address:
							<div class="form-group"> 	 	
								<input type="text"   name="address" placeholder="Enter Business Address"  value="<?php echo $_GET['address']; ?>" required="required" class="form-control" />
							</div>
							 </div> <div class="col-md-4">
							Phone Number 
							<div class="form-group"> 	 	
								<input type="text"  name="phone_number" placeholder="Enter Phone Number"  value="<?php echo $_GET['phone_number']; ?>" required="required" class="form-control" />
							</div>
							 </div> <div class="col-md-4">
							Email Address:
							<div class="form-group"> 	 	
								<input type="text"  name="email_address" placeholder="Enter Email Address"  value="<?php echo $_GET['email_address']; ?>"  required="required" class="form-control" />
							</div>
							 </div> <div class="col-md-4">
							Website Link:
							<div class="form-group"> 	 	
								<input type="text"   name="website_link" placeholder="Enter Website Link"  value="<?php echo $_GET['website_link']; ?>" required="required" class="form-control" />
							</div>
							 </div> <div class="col-md-4">
							Warranty QR Code
							<div class="form-group"> 	 	
								<input type="file"   name="productimage1" value="<?php echo $_GET['company_logo']; ?>" placeholder="Enter Tin Number"  required="required" class="form-control" />
							</div>
							 </div> <div class="col-md-4">
							Company Logo:
							<div class="form-group"> 	 	
								<input type="file"   name="productimage2" placeholder="Select logo"  value="<?php echo $_GET['company_logo']; ?>"  required="required" class="form-control" />
							</div>
							 
							<div class="form-group">
								<input type="hidden" name="id" value="<?php echo $_GET['profile_id']; ?>" required/>
							</div>
							</div> <div class="col-md-4"><br>
							<div class="form-group">
								<button type="submit" name="save_edit_profile"  class="btn btn-success btn-md btn-block">Save Profile</button>
							</div>
							</div>
                    </div>
                </form> 
              </div>
              </div>
			  <div class="panel panel-primary">
				  <div class="panel-heading"><h4>All Company Details</h4> </div>
				  <div class="panel-body">
				<?php include "view_profile.php"?>
			  </div>
            </div>
		</div>
		</div>
		</div>

   <?php   include ("../pages/footer.php");?> 

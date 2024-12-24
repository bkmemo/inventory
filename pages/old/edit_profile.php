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
						<div class="col-lg-12">
							<div class="panel panel-primary">
								<div class="panel-heading">
								  <h4>Manage Business Profile</h4>
								</div>
							</div>
						</div>
		</div>

		<div class="row">
        <div class="col-md-3">
		<div class="box-header with-border">
			<h3>Register Profile</h3>
				  <?php echo "<h4><font color='green'>".$_SESSION['response']."</font></h4>"; $_SESSION['response']=""; ?>
        </div><!-- /.box-header -->
		<div class="box box-primary">
                <form method="post" action="save_edit_profile.php" role="form" enctype="multipart/form-data">
                     Business Name:
					 <div class="form-group"> 
            			<input type="text"  name="business_name" placeholder="Enter Business Name"  value="<?php echo $_GET['business_name']; ?>" required="required" class="form-control" />
					 </div> 
					Business Slogan:
					 <div class="form-group"> 
            			<input type="text"  name="business_slogan" placeholder="Enter Business Slogan"  value="<?php echo $_GET['business_slogan']; ?>" required="required" class="form-control" />
					 </div> 
                    Address:
                	<div class="form-group"> 	 	
            			<input type="text"   name="address" placeholder="Enter Business Address"  value="<?php echo $_GET['address']; ?>" required="required" class="form-control" />
                  	</div>
					Phone Number 
                	<div class="form-group"> 	 	
            			<input type="text"  name="phone_number" placeholder="Enter Phone Number"  value="<?php echo $_GET['phone_number']; ?>" required="required" class="form-control" />
                  	</div>
					Email Address:
                	<div class="form-group"> 	 	
            			<input type="text"  name="email_address" placeholder="Enter Email Address"  value="<?php echo $_GET['email_address']; ?>"  required="required" class="form-control" />
                  	</div>
					Website Link:
                	<div class="form-group"> 	 	
            			<input type="text"   name="website_link" placeholder="Enter Website Link"  value="<?php echo $_GET['website_link']; ?>" required="required" class="form-control" />
                  	</div>
					TIN Number:
                	<div class="form-group"> 	 	
            			<input type="text"   name="tin_number" placeholder="Enter Tin Number"  required="required"  value="<?php echo $_GET['tin_number']; ?>" class="form-control" />
                  	</div>
					Company Logo:
                	<div class="form-group"> 	 	
            			<input type="file"   name="fileToUpload" placeholder="Select logo"  value="<?php echo $_GET['company_logo']; ?>"  required="required" class="form-control" />
                  	</div>
					<div class="form-group">
						<input type="hidden" name="id" value="<?php echo $_GET['profile_id']; ?>" required/>
					</div>
            		<div class="form-group">
                        <button type="submit" name="save_edit_profile"  class="btn btn-success btn-md btn-block">Save Profile</button>
                    </div>
                </form> 
              </div>
              </div><div class="col-md-9">
				<div class="box-header with-border">
				</div><!-- /.box-header -->
			<?php include "view_profile.php"?>
			  
			  
			  </div>
            </div>
				
                </div>
                <!-- /.col-lg-12 -->
            </div>


   <?php   include ("../pages/footer.php");?> 

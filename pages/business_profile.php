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
		<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['response']);?><?php echo htmlentities($_SESSION['response']="");?>
					</div>
        <div class="col-md-3">
		<div class="box-header with-border">
			<h4>Register Profile</h4>
        </div><!-- /.box-header -->
		<div class="box box-primary">
                <form method="post" action="save_profile.php" role="form" enctype="multipart/form-data">
                     Business Name:
					 <div class="form-group"> 
            			<input type="text"  name="business_name" placeholder="Enter Business Name"  required="required" class="form-control" />
					 </div> 
					Business Slogan:
					 <div class="form-group"> 
            			<input type="text"  name="business_slogan" placeholder="Enter Business Slogan"  required="required" class="form-control" />
					 </div> 
                    Address:
                	<div class="form-group"> 	 	
            			<input type="text"   name="address" placeholder="Enter Business Address"  required="required" class="form-control" />
                  	</div>
					Phone Number 
                	<div class="form-group"> 	 	
            			<input type="text"  name="phone_number" placeholder="Enter Phone Number"  required="required" class="form-control" />
                  	</div>
					Email Address:
                	<div class="form-group"> 	 	
            			<input type="text"  name="email_address" placeholder="Enter Email Address"  required="required" class="form-control" />
                  	</div>
					Website Link:
                	<div class="form-group"> 	 	
            			<input type="text"   name="website_link" placeholder="Enter Website Link"  required="required" class="form-control" />
                  	</div>
					TIN Number:
                	<div class="form-group"> 	 	
            			<input type="text"   name="tin_number" placeholder="Enter Tin Number"  required="required" class="form-control" />
                  	</div>
					Company Logo:
                	<div class="form-group"> 	 	
            			<input type="file"   name="fileToUpload" placeholder="Select logo"  required="required" class="form-control" />
                  	</div>
            		<div class="form-group">
                        <button type="submit" name="save_profile"  class="btn btn-success btn-md btn-block">Save Profile</button>
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

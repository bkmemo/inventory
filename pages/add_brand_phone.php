<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
	error_reporting(0);
	include_once 'log.php';
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
					<div class="panel panel-danger">
                        <div class="panel-heading">
                          <h4>Manage Category</h4>
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
 				<h4>Add Brand</h4>
					<form id="main-contact-form" method="post" action="save_brand.php" role="form">
						Brand Name:
						<div class="form-group">
							<input type="text" type="text"  name="brand_name" placeholder="Enter Car Name"  required="required" class="form-control" />
						</div>
						<div class="form-group"> <br />
									<button  type="submit" name="save_brand"  class="btn btn-success btn-bg btn-block">Save Brand</button>
						</div>
						
					</form>
				</div><div class="col-md-9">
				<?php   include ("../pages/manage_brands.php");?> 
				
				</div>					
            </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>

   <?php   include ("../pages/footer.php");?> 
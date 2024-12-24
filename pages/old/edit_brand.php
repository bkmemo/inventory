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
	
	if(isset($_GET['brand_id'])){
		$query="select * from brands where brand_id=$_GET[brand_id]";
		$query_run=mysqli_query($con,$query);
		if($_GET=mysqli_fetch_array($query_run)){
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
                          <h4>Edit Brands</h4>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
        </div>
			<div class="row">
				<div class="col-md-3">
 				<h4>Edit Car</h4>
					<form id="main-contact-form" method="post" action="save_edit_brand.php" role="form">
						Brand Name:
						<div class="form-group">
							<input type="text" type="text"  name="brand_name" value="<?php echo $_GET['brand_name']; ?>" placeholder="Enter Car Name"  required="required" class="form-control" />
						</div>
						<div class="form-group">
						<input type="hidden" name="id" value="<?php echo $_GET['brand_id']; ?>" required/>
						</div>
						<div class="form-group"> <br />
									<button type="submit" name="save_edit_brand"  class="btn btn-success btn-md btn-block">Save Edit Brand</button>
						</div>
						
					</form>
				</div>	<div class="col-md-9">
						<?php   include ("../pages/manage_brands.php");?> 
				</div>				
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php   include ("../pages/footer.php");?>
<?php
		}
		else{
			include "add_brand_phone.php";
		}
	}	
	else{
		include "add_brand_phone.php";
	}
?>
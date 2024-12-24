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
	
	if(isset($_GET['phone_id'])){
		$query="select * from phones where phone_id=$_GET[phone_id]";
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
                          <h4>Manage Items</h4>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
        </div>
			<div class="row">
				<div class="col-md-3">
 				<h4Edit Status For: <br> Serial_Number: <?php echo $_GET['serial_number'] ?></h4><br><br>
					<form id="main-contact-form" method="post" action="save_edit_phone_status.php" role="form">
						Status:
						<div class="form-group">
							<select type="text"  name="phone_status" value="<?php echo $_GET['phone_status'];?>" class="form-control">
							<option>OnSale</option>
							<option>Sold</option>
							</select>
						</div>
						Customer Name     
						<div class="form-group">
							<input type="text"  name="customer_name" value="<?php echo $_GET['customer_name'];?>" placeholder="Enter Customer Phone Name"  class="form-control">
						</div>
						Customer Phone Number
						<div class="form-group">
							<input type="text"  name="customer_phone" value="<?php echo $_GET['customer_phone'];?>" placeholder="Enter Customer Phone Number"  class="form-control">
						</div>
						<div class="form-group">
						<input type="hidden" name="id" value="<?php echo $_GET['phone_id']; ?>"/>
						</div>
						<div class="form-group"> <br />
									<button type="submit" name="save_edit_status"  class="btn btn-success btn-md btn-block">Save Change Status</button>
						</div>
						
					</form>
				</div>
			<div class="col-md-9">
					<?php   include ("../pages/manage_phones.php");?>  
			</div>				
            </div>
                <!-- /.col-lg-12 -->
            </div>			 
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
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
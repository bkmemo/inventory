<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
	error_reporting(0);
	include_once 'log.php';
	include_once 'log.php';
	error_reporting (E_ALL ^ E_NOTICE);
	$con = db_connect();
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
	
	if(isset($_POST['save_cashflow'])){	

		$cashflow_type=$_POST['cashflow_type'];
		$cashflow_category=$_POST['cashflow_category'];
		// check if item alrady exists
		$query0 = "SELECT * FROM cashflow WHERE cashflow_type='$cashflow_type'";
		$query_run0=mysqli_query($con,$query0)or die(mysqli_error($con));
		if(mysqli_num_rows($query_run0)<=0){
			//add new item to the database
			$query="insert into cashflow (cashflow_type,	cashflow_category) values('$cashflow_type', '$cashflow_category')";
			$run = mysqli_query($con,$query)or die(mysqli_error($con));
			$session['response'] = "<strong><font color='green'>$cashflow_type Add To The Database</font></strong>";
		}
		else{
			$session['response'] = "<strong><font color='#cc0000'>$cashflow_type Already Exists In The Database</font></strong>";
		}
		
	}			
?>
<?php   include ("../pages/header.php");?> 
<body>

    <div id="wrapper">
		<?php   include ("../pages/side.php");?>
        <div id="page-wrapper">             		
            <div class="row">
					<div class="col-lg-12">
					<div class="panel-body" align="center">
							<?php   include ("../pages/cashflow_links.php");?>				   
					</div>
             </div>					
                <div class="col-lg-12"><div class="col-md-3"></div>
				<div class="col-md-6">
					<h3>Add CashFlow Type</h3>
					<form id="main-contact-form" method="post" action="cashflow_type.php" role="form">
						CashFlow Type:
						<div class="form-group">
						    <input type="text" type="text"  name="cashflow_type" placeholder="Enter CashFlow Type"  required="required" class="form-control" />
						</div>
						CashFlow Category:
						<div class="form-group">
						    <select type="text" type="text"  name="cashflow_category" placeholder="Select Category"  required="required" class="form-control"> 
							<option>Cash Received</option> 
							<option>Additional Cash Received</option> 
							<option>Expenditure</option> 
							<option>Additional Cash Spent</option> 
							</select>
						</div>
						<div class="form-group">
						   <button type="submit" name="save_cashflow"  class="btn btn-success btn-md btn-block">Save Expense</button>
					    </div>
					</form>
				</div>
				<div class="col-md-3"></div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php   include ("../pages/footer.php");?> 

<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
	include_once 'log.php';
	error_reporting(0);
	error_reporting (E_ALL ^ E_NOTICE);
	$con = db_connect();
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
	
	if(isset($_POST['save_expense'])){	

		$balance_sheet_type=$_POST['balance_sheet_type'];
		$category_type=$_POST['category_type'];
		// check if item alrady exists
		$query0 = "SELECT * FROM balance_sheet WHERE balance_sheet_type='$balance_sheet_type'";
		$query_run0=mysqli_query($con,$query0)or die(mysqli_error($con));
		if(mysqli_num_rows($query_run0)<=0){
			//add new item to the database
			$query="insert into balance_sheet (balance_sheet_type,	category_type) values('$balance_sheet_type', '$category_type')";
			$run = mysqli_query($con,$query)or die(mysqli_error($con));
			$session['response'] = "<strong><font color='green'>$balance_sheet_type Add To The Database</font></strong>";
		}
		else{
			$session['response'] = "<strong><font color='#cc0000'>$balance_sheet_type Already Exists In The Database</font></strong>";
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
							<?php   include ("../pages/balance_sheet_links.php");?>				   
					</div>
             </div>					
                <div class="col-lg-12"><div class="col-md-3"></div>
				<div class="col-md-6">
					<h4>Add Balance Sheet Type</h4>
					<form id="main-contact-form" method="post" action="?action=saveitem" role="form">
						Balance Sheet Type:
						<div class="form-group">
						    <input type="text" type="text"  name="balance_sheet_type" placeholder="Enter Balance Sheet Type"  required="required" class="form-control" />
						</div>
						Balance Sheet Categories:
						<div class="form-group">
						    <select type="text" type="text"  name="category_type" placeholder="Enter Category"  required="required" class="form-control"> 
							<option>Current Assets</option> 
							<option>Investment</option> 
							<option>Property Plan $ Equipments</option> 
							<option>Intergable Assets</option> 
							<option>Other Assets</option> 
							<option>Current Liabilities</option> 
							<option>Long Term Liabilities</option> 
							<option>Owners Equity</option> 
							</select>
						</div>
						<div class="form-group">
						   <button type="submit" name="save_expense"  class="btn btn-success btn-md btn-block">Save Expense</button>
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

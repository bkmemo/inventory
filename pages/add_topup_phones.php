<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
	error_reporting(0);
	error_reporting (E_ALL ^ E_NOTICE);
	$con = db_connect();
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
	function selection($table_name, $column_name, $error) { 
    $con = db_connect();
    // Use DISTINCT to get only unique values in the specified column
    $query = "SELECT DISTINCT $column_name FROM $table_name";
    $query_run = mysqli_query($con, $query);
    
    if ($query_run) {
        $count = mysqli_num_rows($query_run);
        if ($count > 0) {
            echo "<select name='$column_name' class='form-control js-example-basic-single'>";
            while ($a = mysqli_fetch_assoc($query_run)) {
                $category_name = $a[$column_name];
                echo "<option>$category_name</option>";
            }
            echo "</select>";
        } else {
            $_SESSION['response'] = "<h4><font color='#ff0000'>$error</font></h4>";
        }
    } else {
        $_SESSION['response'] = "<h3><font color='#ff0000'>MYSQL ERROR <br />" . mysqli_error($con) . "</font></h3>";
    }
}

	if(isset($_POST['add_topup_phones'])){
		$customer_name=$_POST['customer_name'];
		$ITEM_NAME=$_POST['ITEM_NAME'];
		$topup_value=$_POST['topup_value'];
		$cash_received=$_POST['cash_received'];
		$topup_date=$_POST['topup_date'];
			//add new item to the database
			$query="insert into topup_phones (`ITEM_ID`, `customer_name`, `topup_value`, `cash_received`, `topup_date`) values((SELECT ITEM_ID FROM items WHERE ITEM_NAME='$ITEM_NAME'), '$customer_name', '$topup_value', '$cash_received','$topup_date')";
			$run = mysqli_query($con,$query)or die(mysqli_error($con));
			if($run){
				$_SESSION['response'] = "$customer_name Successfully Added To The Database";
			}
			else{
				$_SESSION['response'] = "Failled Add $customer_name To The Database";
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
					<div class="panel panel-danger">
                        <div class="panel-heading">
								<?php   include ("topup_link.php");?>
                        </div>
                    </div>
                </div>
		<div class="col-lg-12">	
				<div class="panel panel-primary">
				  <div class="panel-heading"><h4>Add New Phone Topup</h4></div>
				  <div class="panel-body">
					<?php if(!empty($_SESSION['response'])): ?>
						<div class="alert alert-success">
								<?php echo $_SESSION['response']; $_SESSION['response'] = ""; ?>
						</div>
					<?php endif; ?>
						<form id="main-contact-form" method="post" action="add_topup_phones.php" role="form">
						<div class="row">
						<div class = "col-md-4">
							Customer Name:
							<div class="form-group">
							<?php  selection('phones','customer_name','No Customers');   ?>
							</div>
						</div>
						<div class = "col-md-4">
							Phone Model
							<div class="form-group">
							<?php  selection('items','ITEM_NAME','No Brands');   ?>
							</div>
						</div>
						<div class="col-md-3">
							Top Up Serial Number
								<div class="form-group"> 	 	
									<?php  selection('phones','serial_number','No Serial Number');   ?>
								</div>	
						</div>
						<div class = "col-md-4">
							Top Up Value Fee:
							<div class="form-group">
							<input type="text" type="text"  name="topup_value" placeholder="Enter topup_value"  required="required" class="form-control"/>
							</div>
						</div>
						<div class = "col-md-4">
							Cash Received:
							<div class="form-group">
							<input type="text" type="text"  name="cash_received" placeholder="Enter cash_received"  required="required" class="form-control"/>
							</div>
						</div>
						<div class = "col-md-4">
							Trade In Date:
							<div class="form-group">
							<input type="date" type="text"  name="topup_date" placeholder="Enter Trade In Date"  max="<?php echo date('Y-m-d'); ?>" required="required" class="form-control"/>
							</div>
						</div>
						<div class = "col-md-4">
							<div class="form-group"><br>
								<button type="submit" name="add_topup_phones"  class="btn btn-success btn-md btn-block">Save Phone Topup</button>
							</div>
						</div>
				</form> 
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    </div>
    </div>
    </div>
    <!-- /#wrapper -->

   <?php   include ("footer.php");?> 

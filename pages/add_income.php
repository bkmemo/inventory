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
	
	if(isset($_POST['save_expense'])){
		$income_name=$_POST['income_name'];
		$amount_earned=$_POST['amount_earned'];
		$description=$_POST['description'];

		$date = $_POST['income_date'];
		$date = strtotime( $date );
		$date = date( 'Y-m-d H:i:s', $date );
			
		// check if item alrady exists
		$query0 = "SELECT * FROM income WHERE income_name='$income_name'";
		$query_run0=mysqli_query($con,$query0)or die(mysqli_error($con));
		if(mysqli_num_rows($query_run0)<=0){
			//add new item to the database
			$query="insert into income (income_name, amount_earned, description, income_date) values('$income_name',  '$amount_earned', '$description', '$date')";
			$run = mysqli_query($con,$query)or die(mysqli_error($con));
			$session['response'] = "$income_name Add To The Database";
		}
		else{
			$session['response'] = "$income_name Already Exists In The Database";
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
					<div class="panel panel-primary">
                        <div class="panel-heading">
                          <h4>Manage Imcome</h4>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>		
            <div class="row">	
			<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['response']);?><?php echo htmlentities($_SESSION['response']="");?>
					</div>		
				<div class="col-md-3">
					<h4>Add Income</h4>

					<form id="main-contact-form" method="post" action="add_income.php" role="form">
						Name:
						<div class="form-group">
						    <input type="text" type="text"  name="income_name" placeholder="Enter Income Earned"  required="required" class="form-control" />
						</div>
						Amount Earned:
						<div class="form-group">
						    <input type="text" type="text"  name="amount_earned" placeholder="Enter Amount Earned"  required="required" class="form-control" />
						</div>
						Description:
						<div class="form-group">
						    <textarea type="text" type="text"  name="description" placeholder="Enter Description"  required="required" class="form-control"></textarea>
						</div>
						<div class="form-group">
							Date <input  id="dopDate" type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>"  name="income_date">
						</div>
						<div class="form-group">
						   <button type="submit" name="save_expense"  class="btn btn-success btn-md btn-block">Save Income</button>
					    </div>
					</form>
				</div>
				<div class="col-md-9">
				<?php   include ("../pages/manage_income.php");?> 
				</div>
            </div>
                <!-- /.col-lg-12 -->
        </div>
            <!-- /.row -->
    </div>
   <?php   include ("../pages/footer.php");?> 

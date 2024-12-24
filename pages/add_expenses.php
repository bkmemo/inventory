<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
	error_reporting (E_ALL ^ E_NOTICE);
	$con = db_connect();
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
	
	if(isset($_POST['save_expense'])){
		$expense_name=$_POST['expense_name'];
		// check if item alrady exists
		$query0 = "SELECT * FROM expenses WHERE EXPENSE_NAME='$expense_name'";
		$query_run0=mysqli_query($con,$query0)or die(mysqli_error($con));
		if(mysqli_num_rows($query_run0)<=0){
			//add new item to the database
			$query="insert into expenses (EXPENSE_NAME) values('$expense_name')";
			$run = mysqli_query($con,$query)or die(mysqli_error($con));
			$SESSION['response'] = "<strong><font color='green'>$expense_name Add To The Database</font></strong>";
		}
		else{
			$SESSION['response'] = "<strong><font color='#cc0000'>$expense_name Already Exists In The Database</font></strong>";
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
					<div class="panel-body" align="right">
						<p>
                            <a href="add_expenses.php"><button type="button" class="btn btn-primary">Add Expense Type</button></a>
                            <a href="manage_expenses.php"><button type="button" class="btn btn-primary">View Expenses Type</button></a>
							<a href="incure_expenses.php"><button type="button" class="btn btn-primary">Enter Expense Incured</button></a>
                            <a href="expenses_history.php"><button type="button" class="btn btn-primary">Expense History</button></a>
                        </p>						   
					</div>
             </div>					
                <div class="col-lg-12">
 <section>
<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>Well done!</strong>	<?php echo htmlentities($SESSION['response']="");?>
					</div>
<h3>Add Expense</h3>
    <form id="main-contact-form" method="post" action="?action=saveitem" role="form">
    <div class = "col-md-6">
    Name:
    	<div class="form-group">
			<input type="text" type="text"  name="expense_name" placeholder="Enter Expense"  required="required" class="form-control" />
      	</div>
      	</div><div class = "col-md-6">
		
				<div class="form-group"> <br />
                    <button type="submit" name="save_expense"  class="btn btn-success btn-md btn-block">Save Expense</button>
               </div>
            </div>
        </form> </section> 
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php   include ("../pages/footer.php");?> 

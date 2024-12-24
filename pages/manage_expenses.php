<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
	error_reporting (E_ALL ^ E_NOTICE);
	$con = db_connect();
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
?>

 <?php   include ("../pages/header.php");?>

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
					<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>Well done!</strong>	<?php echo htmlentities($SESSION['response']="");?>
					</div>
             </div>			
                <div class="col-lg-12">
<?php
			
			$query="select * from expenses";
			$query_run=mysqli_query($con,$query);
			$rows=mysqli_num_rows($query_run);
			echo "<h3>Expenses</h3>";
	        echo "	<div class='dataTable_wrapper'>
			 <table class='table table-striped' id='dataTables-example'>
			    <thead>
		            <tr class='success' align='center'><td>No.</td><td style='text-align:left;'>Expense</td><td>Modify</td><td>Delete</td></tr>
			    </thead>";
				$no_of_items=0;
			while($a=mysqli_fetch_assoc($query_run)){
				$expense_id=$a['EXPENSE_ID'];
				$expense_name=$a['EXPENSE_NAME'];
				$no_of_items++;
				echo "<tbody><tr bgcolor='#fff' align='center'><td>$no_of_items</td><td style='text-align:left;'>$expense_name</td>
				<td><a href='edit_expense.php?expense_id=$expense_id' class='btn btn-success'>Modify</a></td>
				<td><a href='delete_expense.php?expense_id=$expense_id' class='btn btn-success'>Delete</a></td>
				</tr></tbody>";
			}
			echo "</table><br>";
			
			print "</div>";
			
?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

 <?php   include ("../pages/footer.php");?>
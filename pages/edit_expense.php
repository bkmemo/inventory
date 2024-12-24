<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
	error_reporting (E_ALL ^ E_NOTICE);
	$con = db_connect();
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
	if(!isset($_POST['scat'])){
		$query="select * from expenses where EXPENSE_ID=$_GET[expense_id]";
		$query_run=mysqli_query($con,$query);
		if($_GET=mysqli_fetch_array($query_run)){
?>

<?php   include ("../pages/header.php");?>  
    <div id="wrapper">
		<?php   include ("../pages/side.php");?>   
        <div id="page-wrapper">
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
        	<form id="main-contact-form" method="post" action="save_edit_expense.php" role="form">
            <div class="row">
            	
					<h3>Modifying Item</h3>
					<div class="col-md-6">
					Item Name
                    <div class="form-group">
						<input type="text"  name="expense_name" value="<?php echo $_GET['EXPENSE_NAME']; ?>"  required="required" class="form-control">
                	</div>
                 </div>
                 <div class="col-md-4">
					<div class="form-group">
						<input type="hidden" name="expense_id" value="<?php echo $_GET['EXPENSE_ID']; ?>" required/>
					</div>
                 </div>
                 <div class="col-md-6">	
                 
					<div class="form-group">
                    	<button type="submit" name="scat"  class="btn btn-success btn-md btn-block">Save Edit</button>
                	</div>
					</div>	
        		</form>
            </div> <!-- /.row -->
        </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <!-- jQuery -->
<?php   include ("../pages/footer.php");?>  
<?php
		}
		else{
			include "modify_items.php";
		}
	}	
	else{
		include "modify_items.php";
	}
?>
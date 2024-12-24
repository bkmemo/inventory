<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include ("connect.php");
	error_reporting(0);
	include_once 'log.php';
	include "functions.php";
	$con = db_connect();
	error_reporting (E_ALL ^ E_NOTICE);

	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
			if(isset($_GET['EXPENSES_INCURED_ID'])){
				$query="select * from expenses_incured where EXPENSES_INCURED_ID=$_GET[EXPENSES_INCURED_ID]";
				$query_run=mysqli_query($con,$query);
				if($_GET=mysqli_fetch_array($query_run)){
		?>


<!DOCTYPE html>
<html lang="en">

<?php   include ("../pages/header.php");?> 

<body>

    <div id="wrapper">

        <!-- Navigation -->
<?php   include ("../pages/side.php");?>        
        <div id="page-wrapper">
				<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-primary">
								<div class="panel-heading">
								  <h4>Manage Expenses</h4>
								</div>
							</div>
						</div>
						<!-- /.col-lg-12 -->
				</div>
            <div class="row">
			<div class="col-md-3">
		<form  method="post" action="save_edit_incured_expenses.php"  role="form">
        <div class="box box-primary">
			<div class="box-header">
			<h4 class="box-title" style="color:#333333;">Expenses</h4></div>
			<div class="form-group">
				Date <input  id="dopDate" type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>"  name="expense_date">
			</div>
			<div class="form-group">
			Expense Name
			<input type="text" class="form-control"  name="EXPENSE_NAME" value="<?php echo $_GET['EXPENSE_NAME']; ?>" placeholder="Enter Expense Name" required>
			</div>
			<div class="form-group">
					Descreption
					<textarea type="text" class="form-control"  name="Descreption" ><?php echo $_GET['Descreption']; ?></textarea>
			</div>
			<div class="form-group">
					Amount Spent
					<input type="text" class="form-control"  name="amount_spent" value="<?php echo $_GET['AMOUNT_SPENT']; ?>">
			</div> 
			<div class="form-group">
						<input type="hidden" name="id" value="<?php echo $_GET['EXPENSES_INCURED_ID']; ?>" required>
					</div>
			<div class="form-group">
			<button type="submit" name="save_edit_incured_expenses" class="btn btn-primary">Save Edit Record</button>
			</div>		 							
			</form>	
           </div> <!-- /.col-lg-12 -->
      </div><div class="col-md-9">
			<?php   include ("../pages/show_expenses_incured.php");?>
			</div>
	  </div>
    </div><!-- /#page-wrapper -->
 </div><!-- /#wrapper -->
<?php  }} include ("../pages/footer.php");?>
	
</body>
</html>
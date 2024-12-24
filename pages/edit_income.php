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
	if(!isset($_GET['scat'])){
		$query="select * from income where income_id='$_GET[income_id]'";
		$query_run=mysqli_query($con,$query);
		if($_GET=mysqli_fetch_array($query_run)){
?>

<?php   include ("../pages/header.php");?>  
    <div id="wrapper">
		<?php   include ("../pages/side.php");?>   
        <div id="page-wrapper">	
		<div class="row">
                <div class="col-lg-12">
					<div class="panel panel-primary">
                        <div class="panel-heading">
                          <h4>Manage Earned Money</h4>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
        </div>
		<div class="row">
		<div class="col-md-3">
        	<h4>Edit Earned Money</h4>
				<form id="main-contact-form" method="post" action="save_edit_income.php" role="form">

					Item Name
                    <div class="form-group">
						<input type="text"  name="income_name" value="<?php echo $_GET['income_name']; ?>"  required="required" class="form-control">
                	</div>	
					Amount Earned
                    <div class="form-group">
						<input type="text"  name="amount_earned" value="<?php echo $_GET['amount_earned']; ?>"  required="required" class="form-control">
                	</div>
					Description:
						<div class="form-group">
						    <textarea type="text" type="text"  name="description" placeholder="Enter Description"  required="required" class="form-control"><?php echo $_GET['description']; ?></textarea>
						</div>
					Date 
					<div class="form-group">
					<input  id="dopDate" type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>"  name="income_date">
					</div>
					<div class="form-group">
						<input type="hidden" name="income_id" value="<?php echo $_GET['income_id']; ?>" required/>
					</div>
					<div class="form-group">
                    	<button type="submit" name="save_edit_income"  class="btn btn-success btn-md btn-block">Save Edit</button>
                	</div>	
        		</form>
        </div>
		<div class="col-md-9">
		<?php   include ("../pages/manage_income.php");?> 
		</div> <!-- /.row -->
        </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
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
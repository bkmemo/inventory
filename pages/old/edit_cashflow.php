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
	if(!isset($_POST['scat'])){
		$query="select * from cashflow where cashflow_id=$_GET[cashflow_id]";
		$query_run=mysqli_query($con,$query);
		if($_GET=mysqli_fetch_array($query_run)){
?>

<?php   include ("../pages/header.php");?>  
    <div id="wrapper">
		<?php   include ("../pages/side.php");?>   
        <div id="page-wrapper">
					<div class="col-lg-12">
					<div class="panel-body" align="center">
						 <?php   include ("../pages/cashflow_links.php");?>	 						   
					</div>
             </div>		
		<div class="row">
		<div class="col-lg-12">
		<div class="col-md-3"></div>
		<div class="col-md-6">
        	<h3>Edit CashFlow Type</h3>
				<form id="main-contact-form" method="post" action="save_edit_cashflow.php" role="form">
								
					CashFlow Type
                    <div class="form-group">
						<input type="text"  name="cashflow_type" value="<?php echo $_GET['cashflow_type']; ?>"  required="required" class="form-control">
                	</div>
					CashFlow Category
                    <div class="form-group">
						<input type="text"  name="cashflow_category" value="<?php echo $_GET['cashflow_category']; ?>"  required="required" class="form-control">
                	</div>
					<div class="form-group">
						<input type="hidden" name="cashflow_id" value="<?php echo $_GET['cashflow_id']; ?>" required/>
					</div>
					<div class="form-group">
                    	<button type="submit" name="scat"  class="btn btn-success btn-md btn-block">Save Edit</button>
                	</div>	
        		</form>
        </div><div class="col-md-3"></div> <!-- /.row -->
        </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
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
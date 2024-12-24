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
		$query="select * from category where category_id=$_GET[category_id]";
		$query_run=mysqli_query($con,$query);
		if($_GET=mysqli_fetch_array($query_run)){
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
								  <h4>Manage Categories</h4>
								</div>
							</div>
						</div>
		</div>
            <div class="row">
				<div class="col-lg-12">
				<div class = "col-md-3">
					<h4>Modifying category</h4>
					<form id="main-contact-form" method="post" action="save_edit_category.php" role="form">
						Category Name
						<div class="form-group">
							<input type="text"  name="category_name" value="<?php echo $_GET['category_name']; ?>"  required="required" class="form-control">
						</div>
						Description
						<div class="form-group">
							<input type="text"  name="description" value="<?php echo $_GET['description']; ?>"  required="required" class="form-control">
						</div>
						<div class="form-group">
							<input type="hidden" name="id" value="<?php echo $_GET['category_id']; ?>" required/>
						</div>
						<div class="form-group">
							<button type="submit" name="scat"  class="btn btn-success btn-md btn-block">Save Edit</button>
						</div>
					</form>
				</div>
				<div class = "col-md-9">
					<?php   include ("../pages/modify_categories.php");?> 	
                </div> <!-- /.row -->
        </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    </div><!-- /#wrapper -->
    </div><!-- /#wrapper -->
   <?php   include ("../pages/footer.php");?> 
<?php
		}
		else{
			include "modify_categories.php";
		}
	}	
	else{
		include "modify_categories.php";
	}
?>
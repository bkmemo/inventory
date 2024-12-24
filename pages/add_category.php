<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
	error_reporting(0);
	error_reporting (E_ALL ^ E_NOTICE);
	$con = db_connect();
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
	
	if(isset($_POST['save_category'])){
		$category_name=$_POST['category_name'];
		$description=$_POST['description'];
		// check if category alrady exists
		$query0 = "SELECT * FROM category WHERE category_name='$category_name'";
		$query_run0=mysqli_query($con,$query0)or die(mysqli_error($con));
		if(mysqli_num_rows($query_run0)<=0){
			//add new item to the database
			$query="insert into category (category_name,description) values('$category_name','$description')";
			$run = mysqli_query($con,$query)or die(mysqli_error($con));
			if($run){
				$session['response'] = "$category_name Successfully Added To The Database";
			}
			else{
				$session['response'] = "Failled Add $category_name To The Database";
			}
		}
		else{
			$session['response'] = "$cateogry_name Already Exists In The Database";
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
								  <h4>Manage Categories</h4>
								</div>
							</div>
						</div>
		</div>
            <div class="row">
                <div class="col-lg-12">
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['response']);?><?php echo htmlentities($_SESSION['response']="");?>
					</div>
				<div class = "col-md-3">
					<h4>Add New Category</h4>
					<form id="main-contact-form" method="post" action="add_category.php" role="form">
					Category Name
					<div class="form-group">
					<input type="text" type="text"  name="category_name" placeholder="Enter Category Name"  required="required" class="form-control"/>
					</div>
					Description
					<div class="form-group">
						<textarea type="text" type="text"  name="description" placeholder="Enter Description"  required="required" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" name="save_category"  class="btn btn-success btn-md btn-block">Save Category</button>
					</div>
				</div>
				<div class="col-md-9">
				<h3>All Category</h3>
				<?php   include ("../pages/modify_categories.php");?> 
				</div>
				</form> 
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php   include ("../pages/footer.php");?> 

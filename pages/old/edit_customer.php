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
	
	if(isset($_GET['customer_id'])){
		$query="select * from customer where customer_id=$_GET[customer_id]";
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
								  <h4>Manage Customers</h4>
								</div>
							</div>
						</div>
		</div>
     <div class="row">			
       <div class="col-lg-12">
         <div class="col-md-3">
                <h4>Modify Customers </h4>
				    <form id="main-contact-form" method="post" action="save_edit_cust.php" role="form">
							  Customer Name
						   <div class="form-group">
							<input type="text"  name="customer_name" value="<?php echo $_GET['customer_name']; ?>"  required="required" class="form-control">
						   </div>
								Address 
							<div class="form-group">
									<input type="text"  name="address" value="<?php echo $_GET['address']; ?>"  required="required" class="form-control">
							</div>  
								Phone Number 
							<div class="form-group">
									<input type="text"  name="phone" value="<?php echo $_GET['phone']; ?>"  required="required" class="form-control">
							</div>
								Email Address
							<div class="form-group">
									<input type="text"  name="email" value="<?php echo $_GET['email']; ?>"  required="required" class="form-control">
							</div>
							<div class="form-group">
									<input type="hidden" name="id" value="<?php echo $_GET['customer_id']; ?>" required/>
							</div>	
							<div class="form-group">
									<button type="submit" name="scust"  class="btn btn-success btn-md btn-block">Save Edit</button>
							</div>
						
					</form> 
          </div>
		  <div class="col-md-9">
		   <h3>All Customers</h3> 
			<?php   include ("../pages/modify_customers.php");?>  
		  </div>

       </div>
                <!-- /.col-lg-12 -->
      </div>
            <!-- /.row -->
   </div>
        <!-- /#page-wrapper -->

</div>
    <!-- /#wrapper -->
<?php   include ("../pages/footer.php");?>
<?php
		}
		else{
			include "modify_customers.php";
		}
	}	
	else{
		include "modify_customers.php";
	}
?>
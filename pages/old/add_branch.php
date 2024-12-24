<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
	error_reporting(0);
	error_reporting (E_ALL ^ E_NOTICE);
	$con = db_connect();
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
//end of function
	
	if(isset($_POST['save_branch'])){
		$branch_name=$_POST['branch_name'];
		$location=$_POST['location'];
		$phone_number=$_POST['phone_number'];
		$email_address=$_POST['email_address'];
		
		// check if item alrady exists
		$query0 = "SELECT * FROM branches WHERE branch_name='$branch_name'";
		$query_run0=mysqli_query($con,$query0)or die(mysqli_error($con));
		if(mysqli_num_rows($query_run0)<=0){
			
			//set item sell price to sero
					$query="insert into branches (branch_name, location, phone_number, email_address) values('$branch_name', '$location', '$phone_number', '$email_address')";
					$run = mysqli_query($con,$query);
					$_SESSION['response'] = "<h4><font color='green'>Branch has been added to the database</font></h4>";
		}
		else{
			//echo "<center><strong><font color='#cc0000'>$item_name Already Exists In The Database</font></strong></center>";
			$_SESSION['response'] = "<h4><font color='green'>Sale has been added to the database</font></h4>";
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
					<div class="panel-body" align="center">
						
                            <?php   include ("../pages/branch_links.php");?>					   
					</div>
             </div>
             <?php echo $_SESSION['response']; $_SESSION['response']=""; ?> 
					
            <div class="row"><div class="form-row">
                <div class="col-lg-12">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h4>Add New Store</h4>
                <form id="main-contact-form" method="post" action="add_branch.php" role="form">
                     Store Name:
					 <div class="form-group"> 
            			<input type="text" type="text"  name="branch_name" placeholder="Enter Branch Name"  required="required" class="form-control" />
					 </div> 	
                    Location:
                	<div class="form-group"> 	 	
            			<input type="text" type="text"  name="location" placeholder="Enter Branch Location"  required="required" class="form-control" />
                  	</div>
					Phone Number
                	<div class="form-group"> 	 	
            			<input type="text" type="text"  name="phone_number" placeholder="Enter Phone Number"  required="required" class="form-control" />
                  	</div>
					Email Address:
                	<div class="form-group"> 	 	
            			<input type="text" type="text"  name="email_address" placeholder="Enter Email Address"  required="required" class="form-control" />
                  	</div>
            		<div class="form-group"> <br />
                        <button type="submit" name="save_branch"  class="btn btn-success btn-md btn-block">Save Branch</button>
                    </div>
                </form> 
               </div><div class="col-md-3"></div> </div>
                <!-- /.col-lg-12 -->
            </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php   include ("../pages/footer.php");?> 

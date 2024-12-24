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
//end of function
	
	if(isset($_POST['save_staff'])){
		$staff_name=$_POST['staff_name'];
		$location=$_POST['address'];
		$phone_number=$_POST['phone_number'];
		$email_address=$_POST['email_address'];
		$user_type=$_POST['position'];
		$password=$_POST['password'];
		$username=$_POST['username'];
		
		$myusername1 = stripslashes($username);
		$mypassword1 = stripslashes($password);
		$myusername2 = mysqli_real_escape_string($con,$username);
		$mypassword2 = mysqli_real_escape_string($con,$password);

	
		$mypassword3 = md5($mypassword2);
		// check if item alrady exists
		$query0 = "SELECT * FROM user WHERE username='$username'";
		$query_run0=mysqli_query($con,$query0)or die(mysqli_error($con));
		if(mysqli_num_rows($query_run0)<=0){
			
			//set item sell price to sero
					$query="insert into user (username, password, user_type, staff_name, address, phone_number, email_address) values('$myusername2', '$mypassword3', '$user_type', '$staff_name', '$location', '$phone_number', '$email_address')";
					$run = mysqli_query($con,$query)or die(mysqli_error($con));
					$_SESSION['response'] = "<h4><font color='green'>User has been added to the database</font></h4>";
		}
		else{
			//echo "<center><strong><font color='#cc0000'>$item_name Already Exists In The Database</font></strong></center>";
			$_SESSION['response'] = "<h4><font color='red'>Sale has Not been added to the database</font></h4>";
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
						
                            <?php   include ("../pages/user_links.php");?>					   
					</div>
             </div>
             <?php echo $_SESSION['response']; $_SESSION['response']=""; ?> 
					
            <div class="row"><div class="form-row">
                <div class="col-lg-12">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h3 align="center">Add new staff</h3>
                <form id="main-contact-form" method="post" action="add_users.php" role="form">
                     Staff Name:
					 <div class="form-group"> 
            			<input type="text"   name="staff_name" placeholder="Enter Staff Name"  required="required" class="form-control" />
					 </div> 	
                    Phone Number:
                	<div class="form-group">
            			<input type="text"  name="phone_number" placeholder="Enter Phone Number"  required="required" class="form-control" />
                  	</div>
					Location:
                	<div class="form-group">
            			<input type="text"  name="address" placeholder="Enter Address"  required="required" class="form-control" />
                  	</div>
					Email Address:
                	<div class="form-group"> 	 	
            			<input type="email"  name="email_address" placeholder="Enter Email Address"  required="required" class="form-control" />
                  	</div>
					Position:
                	<div class="form-group"> 	 	
            			<input type="text"   name="position" placeholder="Enter Position"  required="required" class="form-control" />
                  	</div>
					Username:
					<div class="form-group"> 	 	
            			<input type="text"  name="username" placeholder="Enter Username"  required="required" class="form-control" />
                  	</div>
					Password:
					<div class="form-group"> 	 	
            			<input type="password"  name="password" placeholder="Enter Password"  required="required" class="form-control" />
                  	</div>
            		<div class="form-group"> <br />
                        <button type="submit" name="save_staff"  class="btn btn-success btn-md btn-block">Save New Staff</button>
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

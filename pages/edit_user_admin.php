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
	
	if(isset($_GET['id'])){
		$query="select * from user WHERE id=$_GET[id]";
		$query_run=mysqli_query($con,$query);
		if($_GET=mysqli_fetch_array($query_run)){
			} }
?>

<?php   include ("../pages/header.php");?> 

<body>
    <div id="wrapper">
   <?php   include ("../pages/side.php");?>   
        <div id="page-wrapper">
        <div class="row">
                <div class="col-lg-12">
					<div class="panel panel-danger">
                        <div class="panel-heading">
                          <?php include ("../pages/staff_links.php");?>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
        </div>
				<div class="panel panel-primary">
				  <div class="panel-heading"><h3>Edit User Details</h3></div>
				  <div class="panel-body">
				  <?php if(!empty($_SESSION['response'])): ?>
						<div class="alert alert-success">
								<?php echo $_SESSION['response']; $_SESSION['response'] = ""; ?>
						</div>
					<?php endif; ?>
            <h4>Edit User Registration</h4>
            <form id="main-contact-form" method="post" action="save_edit_staff.php" role="form">
			<div class="row">
							<div class="col-md-4">
						UserName
						<div class="form-group">
							  <input type="text"  name="username"  value="<?php echo $_GET['username']; ?>"  required="required" class="form-control">
						</div>
						</div><div class="col-md-4">
						Old Password
						<div class="form-group">
							  <input type="password"  name="old_password"  required="required" class="form-control">
						</div>
						</div><div class="col-md-4">
						New Password
						<div class="form-group">
							  <input type="password"  name="new_password"  required="required" class="form-control">
						</div>
						</div><div class="col-md-4">
						User Type
						<div class="form-group">
							  <select type="text"  name="user_type"  required="required" class="form-control">
							  <option>admin</option>
							  <option>Sfaff</option>
							  </select>
						</div>
						</div><div class="col-md-4">
						  Staff Name	
						<div class="form-group">
							  <input type="text"  name="staff_name"  value="<?php echo $_GET['staff_name']; ?>"  required="required" class="form-control">
						</div>
						</div><div class="col-md-4">
							User Position  
						<div class="form-group">
							 <input type="text"  name="position"  value="<?php echo $_GET['position']; ?>"   required="required" class="form-control">
						</div>
						</div><div class="col-md-4">
							Address
						<div class="form-group">
							  <input type="text"  name="address"  value="<?php echo $_GET['address']; ?>"  required="required" class="form-control">
						</div>
						</div><div class="col-md-4">
							Phone Number			
						<div class="form-group">
							  <input type="text"  name="phone_number"  value="<?php echo $_GET['phone_number']; ?>"  required="required" class="form-control">
						</div>
						</div><div class="col-md-4">
							Email Address			
						<div class="form-group">
							  <input type="text"  name="email_address"  value="<?php echo $_GET['email_address']; ?>"  required="required" class="form-control">
						</div>
						</div>
						<div class="form-group">
							<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" required/>
						</div>
						<div class="col-md-4"><br>
							<div class="form-group">
								<button type="submit" name="edit_staff"  class="btn btn-success btn-md btn-block">Save Edit Staff</button>
							</div>
							</div>
            </div>
            </div>
            </div>
				
            
        </form> </div>

                </div>
	<?php   include ("../pages/footer.php");?>
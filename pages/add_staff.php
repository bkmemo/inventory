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
	if(isset($_POST['Add_staff'])){
		$staff_name=$_POST['staff_name'];mysqli_real_escape_string($con,$_POST['address']);
		$address=mysqli_real_escape_string($con,$_POST['address']);
		$phone_number=mysqli_real_escape_string($con,$_POST['phone']);
		$email_address=mysqli_real_escape_string($con,$_POST['email']);
		$position=mysqli_real_escape_string($con,$_POST['position']);
		$username=mysqli_real_escape_string($con,$_POST['username']);
		$password=mysqli_real_escape_string($con,$_POST['password']);
		$mypassword=md5($password);
		$query = "SELECT * FROM `user` WHERE username = '{$username}'";
		$result = mysqli_query($con,$query);
 		if ( mysqli_num_rows ( $result ) >= 1 ){
			/* Username already exists */
			$_SESSION['response']= "Sorry staff already exists";
		}
		else{
  			$query="insert into user(username, password, user_type, staff_name, position, address, phone_number, email_address)values('$username','$mypassword','User','$position','$staff_name','$address','$phone_number','$email_address')";
			mysqli_query($con,$query)or die(mysqli_error());
			   $_SESSION['response']= "$username Successfully Registered";
			}
		}
?>
<?php   include ("../pages/header.php");?> 
<body>
	<div id="wrapper">
		<!-- Navigation -->   
		<?php include ("../pages/side.php");?>
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
				  <div class="panel-heading"><h3>Add User</h3></div>
				  <div class="panel-body">
						<?php if(!empty($_SESSION['response'])): ?>
						<div class="alert alert-success">
								<?php echo $_SESSION['response']; $_SESSION['response'] = ""; ?>
						</div>
					<?php endif; ?>
                	
						<form id="main-contact-form" method="post" action="add_staff.php" role="form" onsubmit="return checkForm(this)";>
						<div class="row">
						<div class="col-md-4">
							Staff Name		
							<div class="form-group">
							<input type="text"  name="staff_name" placeholder="Staff Name"   class="form-control">
							</div>
							</div><div class="col-md-4">
							Address        		
							<div class="form-group">
							<input type="text"  name="address" placeholder="Address"  class="form-control">
							</div>
							</div><div class="col-md-4">
							Phone Number
							<div class="form-group">
							<input type="text"  name="phone" placeholder="Phone"  class="form-control">
							</div>
							</div><div class="col-md-4">
							Email Address   
							<div class="form-group">
							<input type="text"  name="email" placeholder="Email Address"  class="form-control">
							</div>
							</div><div class="col-md-4">
							Position   
							<div class="form-group">
							<input type="text"  name="position" placeholder="Enter Position"  class="form-control">
							</div>
							</div><div class="col-md-4">
							Username   
							<div class="form-group">
							<input type="text"  name="username" placeholder="Enter Username"  class="form-control">
							</div>
							</div><div class="col-md-4">
							Password   
							<div class="form-group">
							<input type="password"  name="password" placeholder="Enter Password"  class="form-control">
							</div>
							</div><div class="col-md-4">
							<div class="form-group">
							<button type="submit" name="Add_staff"  class="btn btn-success btn-md btn-block">Register </button>
							</div>
							</div>
							</div>
						</form> 
					</div>
				</div>
			</div>
                <!-- /.col-lg-12 -->
        </div>

   <?php   include ("../pages/footer.php");?> 
   
   <script>

var form_being_submitted = false; /* global variable */

var checkForm = function(form) {

  if(form_being_submitted) {
    alert("The form is being submitted, please wait a moment...");
    form.myButton.disabled = true;
    return false;
  }

  if(form.staff_name.value == "") {
    alert("Please enter staff_name");
    form.staff_name.focus();
    return false;
  }
  if(form.address.value == "") {
    alert("Please enter address");
    form.address.focus();
    return false;
  }
  if(form.phone.value == "") {
    alert("Please enter phone");
    form.phone.focus();
    return false;
  }
  if(form.email.value == "") {
    alert("Please enter email");
    form.email.focus();
    return false;
  }
  if(form.position.value == "") {
    alert("Please enter position");
    form.position.focus();
    return false;
  }
  if(form.username.value == "") {
    alert("Please enter username");
    form.username.focus();
    return false;
  }
  if(form.password.value == "") {
    alert("Please enter password");
    form.password.focus();
    return false;
  }


  form.Add_staff.value = 'Submitting form...';
  form_being_submitted = true;
  return true; /* submit form */
};

var resetForm = function(form) {
  form.myButton.disabled = false;
  form.myButton.value = "Submit";
  form_being_submitted = false;
};

</script>
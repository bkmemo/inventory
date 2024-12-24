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
	if(isset($_POST['custs'])){
		$a=mysqli_real_escape_string($con,$_POST['customer_name']);
		$v=mysqli_real_escape_string($con,$_POST['address']);
		$b=mysqli_real_escape_string($con,$_POST['phone']);
		$c=mysqli_real_escape_string($con,$_POST['email']);
        $query0 = "SELECT * FROM customer WHERE customer_name='$a'";
		$query_run0=mysqli_query($con,$query0)or die(mysqli_error($con));
		if(mysqli_num_rows($query_run0)<=0){
		$query="insert into customer (`customer_id`, `customer_name`, `address`, `phone`, `email`) values(null,'$a','$v','$b','$c')";
		mysqli_query($con,$query)or die(mysqli_error());
			$_SESSION['response']= "<h4>$a Added successfully</h4>";
        }else{
                $_SESSION['response'] = "<h4><font color='red'>Sorry $a Already Exists In The Database</font></h4>";
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
					<div class="panel panel-danger">
                        <div class="panel-heading">
                          <?php include ("../pages/customer_links.php");?>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
        </div>
            	
			<div class="panel panel-primary">
				  <div class="panel-heading"><h4>Add Customer</h4> </div>
				  <div class="panel-body">
					<?php if(!empty($_SESSION['response'])): ?>
						<div class="alert alert-success">
								<?php echo $_SESSION['response']; $_SESSION['response'] = ""; ?>
						</div>
					<?php endif; ?>
						
                    
                    <form id="main-contact-form" method="post" action="add_customer.php" role="form" onsubmit="return checkForm(this);">
				<div class="row">
					<div class="col-md-4">
						Customer Name 
						<div class="form-group">
						<input type="text"  name="customer_name" placeholder="Customer Name"  class="form-control">
						</div>
					</div><div class="col-md-4">
						Address 
						<div class="form-group">
						<input type="text"  name="address" placeholder="Address"   class="form-control">
						</div>
					</div><div class="col-md-4">
						Phone Number 
						<div class="form-group">
						<input type="text"  name="phone" placeholder="Phone Number"   class="form-control">
						</div>
					</div><div class="col-md-4">
						Email Address
						<div class="form-group">
						<input type="text"  name="email" placeholder="Email Address"  class="form-control">
						</div>
					</div>
					<div class="col-md-4"><br>
						<div class="form-group">
							<button type="submit" name="custs"  class="btn btn-success btn-md btn-block">Save Customer</button>
						</div>
					</div>
                </div>
            </form>
		</div>
                </div>
            </div>

        </div>

    <!-- /#wrapper -->
 
   <?php   include ("../pages/footer.php");?>  
</body>

</html>
<script>

var form_being_submitted = false; /* global variable */

var checkForm = function(form) {

  if(form_being_submitted) {
    alert("The form is being submitted, please wait a moment...");
    form.myButton.disabled = true;
    return false;
  }

  if(form.customer_name.value == "") {
    alert("Please enter customer_name");
    form.customer_name.focus();
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

  form.custs.value = 'Submitting form...';
  form_being_submitted = true;
  return true; /* submit form */
};

var resetForm = function(form) {
  form.myButton.disabled = false;
  form.myButton.value = "Submit";
  form_being_submitted = false;
};

</script>


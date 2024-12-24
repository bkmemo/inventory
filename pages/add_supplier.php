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
	if(isset($_POST['Add_supplier'])){
		$b=mysqli_real_escape_string($con,$_POST['supplier_name']);
		$c=mysqli_real_escape_string($con,$_POST['address']);
		$d=mysqli_real_escape_string($con,$_POST['phone']);
		$e=mysqli_real_escape_string($con,$_POST['email']);
		$supplier_type=mysqli_real_escape_string($con,$_POST['supplier_type']);
		$query = "SELECT * FROM `suppliers` WHERE supplier_name = '{$b}'";
		$result = mysqli_query($con,$query);
 		if (mysqli_num_rows ( $result ) >= 1 ){
			/* Username already exists */
			$_SESSION['response']= "Sorry supplier already exists";
		}
		else{
			$query="insert into suppliers(`supplier_id`, `supplier_name`, `address`, `phone`, `email`,`supplier_type`) values(null,'$b','$c','$d','$e','$supplier_type')";
			mysqli_query($con,$query)or die(mysqli_error());
			$_SESSION['response']= "Supplier successfully Registered";
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
                          <?php include ("../pages/supplier_links.php");?>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
        </div>
            	
			<div class="panel panel-primary">
				  <div class="panel-heading"><h4>Add Supplier</h4></div>
				  <div class="panel-body">
						<?php if(!empty($_SESSION['response'])): ?>
						<div class="alert alert-success">
								<?php echo $_SESSION['response']; $_SESSION['response'] = ""; ?>
						</div>
					<?php endif; ?>
				
				
                <form id="main-contact-form" method="post" action="add_supplier.php" role="form" onsubmit="return checkForm(this)";>
				<div class="row">
				<div class="col-md-4">
                    Supplier Name:	
                    <div class="form-group">
						<input type="text"  name="supplier_name" placeholder="Supplier" id="tag" class="form-control">
                     </div>
                     </div><div class="col-md-4">
                    Address        
                    <div class="form-group">
						<input type="text"  name="address" placeholder="Address" id="tag"   class="form-control">
                    </div>
					</div><div class="col-md-4">
                    Phone Number
                    <div class="form-group">
						<input type="text"  name="phone" placeholder="Phone"  class="form-control">
                    </div>
					</div><div class="col-md-4">
                    Email Address   
                    <div class="form-group">
						<input type="email"  name="email" placeholder="Email Address"  class="form-control">
                    </div>
					</div><div class="col-md-4">
					Supplier Type  
                    <div class="form-group">
						<select type="email"  name="supplier_type" placeholder="Email supplier_type"  class="form-control">
							<option>International Supplier</option>
							<option>Local Supplier</option>
						</select>
                    </div>
					</div><div class="col-md-4"><br>
				    <div class="form-group">
						<button type="submit" name="Add_supplier"  class="btn btn-success btn-md btn-block">Register Supplier</button>
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
<!-- Supplier -->
<script>

var form_being_submitted = false; /* global variable */

var checkForm = function(form) {

  if(form_being_submitted) {
    alert("The form is being submitted, please wait a moment...");
    form.myButton.disabled = true;
    return false;
  }

  if(form.supplier_name.value == "") {
    alert("Please enter supplier_name");
    form.supplier_name.focus();
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

  form.Add_supplier.value = 'Submitting form...';
  form_being_submitted = true;
  return true; /* submit form */
};

var resetForm = function(form) {
  form.myButton.disabled = false;
  form.myButton.value = "Submit";
  form_being_submitted = true;
};

</script>